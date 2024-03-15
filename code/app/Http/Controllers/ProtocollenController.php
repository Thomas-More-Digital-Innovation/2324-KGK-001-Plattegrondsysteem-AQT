<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\QueryException;

use App\Models\ProtocolType;
use App\Models\ProtocolDetail;

class ProtocollenController extends Controller
{
    // admin protocollen
    // view pages
    public function protocoladmin(){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID==4){
                $protocollen = ProtocolDetail::all();
                $protocoltypes = ProtocolType::all();
                return view('components.pages.protocollenadmin', ['protocollen' => $protocollen, 'protocoltypes'=> $protocoltypes]);
            }
            else{
                abort(401);
            }
        }
    }

    public function protocoledit($id){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID==4){
                $protocol = ProtocolDetail::where('id', $id)->first();
                $protocoltypes = ProtocolType::all();
                return view('components.pages.protocollenedit', ['protocol' => $protocol, 'protocoltypes'=> $protocoltypes]);
            }
            else{
                abort(401);
            }
        }
    }

    // data handlers
    public function protocoladd(Request $request){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                try {
                    $name = $request->input('name');
                    $protocoltypeid = $request->input('protocoltypeid');
                    $icon = $request->input('icon');

                    if ($request->file('file')->getSize() > 3145728){
                        return redirect()->back()->with('error', 'Het bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                    }
                    else {
                        
                        $filename = $request->file('file')->getClientOriginalName();
                        $file = $request->file('file')->storeAs('./files', $filename, 'public_uploads');
                
                        $protocolDetail = new ProtocolDetail;
                        $protocolDetail->name = $name;
                        $protocolDetail->protocoltypeid = $protocoltypeid;
                        $protocolDetail->icon = $icon;
                        $protocolDetail->file = $file;

                        $protocolDetail->save();
    
                        return back();
                    }

                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                }
            }
            else{
                abort(401);
            }
        }
    }

    public function protocolupdate(Request $request, $id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $name = $request->input('name');
                $protocoltypeid = $request->input('protocoltypeid');
                $icon = $request->input('icon');
                $file = $request->input('fileOld');
                
                
                if ($request->hasFile('file')){

                    if ($request->file('file')->getSize() > 3145728){
                        return redirect()->back()->with('error', 'Het bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                    }

                    $filename = $request->file('file')->getClientOriginalName();
                    $file = $request->file('file')->storeAs('./files', $filename, 'public_uploads');
                }
                
                try {
                    $protocolDetail = ProtocolDetail::find($id);
                    $protocolDetail->name = $name;
                    $protocolDetail->protocoltypeid = $protocoltypeid;
                    $protocolDetail->icon = $icon;
                    $protocolDetail->file = $file;

                    $protocolDetail->save();

                    return redirect('./admin/protocollen');
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                }

            }
            else{
                abort(401);
            }
        }
    }

    public function protocoldelete($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                try {
                    ProtocolDetail::where('id', $id)->delete();
                    return back();
                } catch (QueryException $e) {
                    if ($e->errorInfo[1] === 1451) { // check for specific error code
                        return back()->with('error', 'Kan dit protocol niet verwijderen omdat het nog in gebruik is.');
                    } else { // handle other
                        return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                    }
                }
            }
            else{
                abort(401);
            }
        }
    }
}