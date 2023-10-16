<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class LampController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $lamp = DB::table('lamp')->get(); 
                return view('lampadmin', ['lamp' => $lamp]);
            } else {
                abort(401);
            }
        }
    }

    public function make(Request $request)
    {
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {

                $lampName = $request->input('naam');
                DB::table('lamp')->insert(['name' => $lampName]);

                return redirect()->route('lampadmin')->with('success', 'Lamp added successfully');
            } else {
                abort(401);
            }
        }
    }

    public function lampedit($id){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID==4){
                $lamp = DB::table('lamp')->where('id', $id)->first();
                return view('lampedit', ['lamp' => $lamp]);
            }
            else{
                abort(401);
            }
        }
    }

    public function lampupdate($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                try {
                    $query = DB::table('lamp')->where('id', $id)->update([
                        'name'=>request('name')
                    ]);
                    return redirect('/lampadmin');
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                }
            }
            else{
                abort(401);
            }
        }
    }

    public function deleteLamp($id){
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
            if (!DB::table('lampkant')->where('lampid', '=', $id)->exists()) {
                $lamp = DB::table('lamp')->where('id', $id);
                $lamp->delete();
                return back();
            } else {
                return back()->with('error', 'Lamp kan niet worden verwijderd omdat deze nog aan een inventaris gekoppeld is.');
            }
            }
            else{
                abort(401);
            }
        }
    }
    
}

