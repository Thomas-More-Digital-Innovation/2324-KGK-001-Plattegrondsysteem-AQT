<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class voedselsoortenController extends Controller
{
    public function voedselSoorten(){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsType = DB::table('voedingstype')->get();
                $voedingsRichtlijnen = DB::table('voedingsrichtlijnen')->get();
                return view('voedselsoorten', 
                ['voedingsType' => $voedingsType,
                'voedingsRichtlijnen' => $voedingsRichtlijnen]);
            }
            else{
                abort(401);
            }
        }
    }

    public function addeditvoedselSoort(Request $request){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $fotoname = $request->file('upload')->getClientOriginalName();
                $foto = $request->file('upload')->storeAs('/images', $fotoname, 'public_uploads');
                $vs = $request->input('voedselsoort');
                $rn = $request->input('voedingsrichtlijn');
                $type = $request->input('typesubmit');
                if (!DB::table('voedingstype')->where([
                    ['name', '=', $vs],
                    ['voedingsrichtlijnid', '=', $rn],
                    ['icon', '=', $foto],
                ])->exists()) {
                    if ($type == "add") {
                        DB::table('voedingstype')->insert([
                            'name'=> $vs,
                            'voedingsrichtlijnid'=> $rn,
                            'icon'=>$foto,
                        ]);
                    } elseif ($type == "edit") {
                        DB::table('voedingstype')
                        ->where([
                            ["id", "=", $request->input('id')],
                        ])
                        ->update([
                            "name"=>$vs,
                            "voedingsrichtlijnid"=>$rn,
                            'icon'=>$foto,
                        ]);
                    }
                }
                else {
                    return back()->with('error', 'Deze combinatie bestaat al!');
                }
                return back();
            }
            else{
                abort(401);
            }
        }
    }
    public function deletevoedselSoort($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsoort = DB::table('voedingstype')->where('id', $id);
                $voedingsoort->delete();
                return back();
            }
            else{
                abort(401);
            }
        }
    }
    public function editvoedselSoort($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsoort = DB::table('voedingstype')->where('id', $id)->first();
                $voedingsRichtlijnen = DB::table('voedingsrichtlijnen')->get();
                return view('editVoedselsoorten',
                ['voedingsRichtlijnen' => $voedingsRichtlijnen], compact('voedingsoort'));
            }
            else{
                abort(401);
            }
        }
    }
    public function updatevoedselSoort(Request $request, $id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){

                $query = DB::table('voedingstype')->where('id', $id)->update([
                    'name'=>$request->input('name'),
                    'voedingsrichtlijnid'=>$request->input('voeding'),
                    'icon'=>$request->input('icon'),
                ]);

                return redirect('./voedselsoorten');
            }
            else{
                abort(401);
            }
        }
    }
}
