<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\QueryException;

class ProtocollenController extends Controller
{
    // admin protocollen
    // view pages
    public function protocoladmin(){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID==4){
                $protocollen = DB::table('protocoldetail')->get();
                $protocoltypes = DB::table('protocoltype')->get();
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
                $protocol = DB::table('protocoldetail')->where('id', $id)->first();
                $protocoltypes = DB::table('protocoltype')->get();
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
                
    
                        DB::table('protocoldetail')->insert([
                            'name'=>$name,
                            'protocoltypeid'=>$protocoltypeid,
                            'icon'=>$icon,
                            'file'=>$file
                        ]);
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
                
                if ($request->file('file')->getSize() > 3145728){
                    return redirect()->back()->with('error', 'Het bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                }
                else {

                    if ($request->hasFile('file')){ 
                        $filename = $request->file('file')->getClientOriginalName();
                        $file = $request->file('file')->storeAs('./files', $filename, 'public_uploads');
                    }
    
                    try {
                        $query = DB::table('protocoldetail')->where('id', $id)->update([
                            'name'=>$name,
                            'protocoltypeid'=>$protocoltypeid,
                            'icon'=>$icon,
                            'file'=>$file
                        ]);
                        return redirect('./admin/protocollen');
                    } catch (QueryException $e) {
                        return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                    }
                    
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
                    DB::table('protocoldetail')->where([['id', '=', $id]])->delete();
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