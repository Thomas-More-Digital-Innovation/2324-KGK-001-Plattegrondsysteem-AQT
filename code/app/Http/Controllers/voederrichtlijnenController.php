<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class voederrichtlijnenController extends Controller
{
    public function voederrichtlijnen(){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsRichtlijnen = DB::table('voedingsrichtlijnen')->get();
                return view('voedingsrichtlijnenAdmin', 
                ['voedingsRichtlijnen' => $voedingsRichtlijnen]);
            }
            else{
                abort(401);
            }
        }
    }

    public function addVoederrichtlijn(Request $request){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $query = DB::table('voedingsrichtlijnen')->insert([
                    'name'=>$request->input('name'),
                    'icon'=>$request->input('icon'),
                    'color'=>$request->input('color'),
                ]);
                return back();
            }
            else{
                abort(401);
            }
        }
    }
    public function deleteVoederrichtlijn($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsRichtlijnen = DB::table('voedingsrichtlijnen')->where('id', $id);
                $voedingsRichtlijnen->delete();
                return back();
            }
            else{
                abort(401);
            }
        }
    }
    public function editVoederrichtlijn($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsRichtlijn = DB::table('voedingsrichtlijnen')->where('id', $id)->first();
                return view('editVoedingsrichtlijnen', compact('voedingsRichtlijn'));
            }
            else{
                abort(401);
            }
        }
    }
    public function updateVoederrichtlijn(Request $request, $id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $query = DB::table('voedingsrichtlijnen')->where('id', $id)->update([
                    'name'=>$request->input('name'),
                    'icon'=>$request->input('icon'),
                    'color'=>$request->input('color'),
                ]);
                return redirect('/voedingsrichtlijnenadmin');
            }
            else{
                abort(401);
            }
        }
    }
}
