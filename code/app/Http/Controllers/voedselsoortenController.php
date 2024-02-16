<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\VoedingsRichtlijnen;
use App\Models\VoedingsType;

class voedselsoortenController extends Controller
{
    public function voedselSoorten(){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsType = VoedingsType::all();
                $voedingsRichtlijnen = VoedingsRichtlijnen::all();
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
                        $voedingsType = new VoedingsType;
                        $voedingsType->name = $vs;
                        $voedingsType->voedingsrichtlijnid = $rn;
                        $voedingsType->icon = $foto;
                        $voedingsType->save();
                    } elseif ($type == "edit") {
                        $voedingsType = VoedingsType::find($id = $request->input('id'));
                        $voedingsType->name = $vs;
                        $voedingsType->voedingsrichtlijnid = $rn;
                        $voedingsType->icon = $foto;
                        $voedingsType->save();
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
                VoedingsType::Destroy($id);
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
                $voedingsType = VoedingsType::find($id);
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

               $voedingsType = VoedingsType::find($id);
               $voedingsType->name = $vs;
                $voedingsType->voedingsrichtlijnid = $rn;
                $voedingsType->icon = $foto;
                $voedingsType->save();
                return redirect('./voedselsoorten');
            }
            else{
                abort(401);
            }
        }
    }
}
