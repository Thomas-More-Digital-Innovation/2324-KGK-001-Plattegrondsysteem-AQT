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
                $name = $request->input('name');
                $protocoltypeid = $request->input('protocoltypeid');
                $icon = $request->input('icon');
                $file = $request->input('file');
                DB::table('protocoldetail')->insert([
                    'name'=>$name,
                    'protocoltypeid'=>$protocoltypeid,
                    'icon'=>$icon,
                    'file'=>$file
                ]);
                return back();
            }
            else{
                abort(401);
            }
        }
    }

    public function protocolupdate($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $query = DB::table('protocoldetail')->where('id', $id)->update([
                    'name'=>request('name'),
                    'protocoltypeid'=>request('protocoltypeid'),
                    'icon'=>request('icon'),
                    'file'=>request('file')
                ]);
                return redirect('/admin/protocollen');
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
                    if ($e->errorInfo[1] === 1451) {
                        // Handle the foreign key constraint violation error here
                        return back()->with('error', 'Kan dit protocol niet verwijderen omdat het nog in gebruik is.');
                    } else {
                        // Handle other database-related errors
                        // You can log the error or display a generic error message
                        return back()->with('error', 'An error occurred while processing your request.');
                    }
                }
            }
            else{
                abort(401);
            }
        }
    }
}