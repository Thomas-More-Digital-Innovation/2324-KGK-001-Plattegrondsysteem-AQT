<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function deleteLamp($id){
        if (Auth::id()) {
            $roleID = Auth::user()->roleid;
            if ($roleID == 4) {
                $lamp = DB::table('lamp')->where('id', $id);
                $lamp->delete();

                return back();
            }
            else{
                abort(401);
            }
        }
    }
    
}

