<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\VoedingsRichtlijnen;

class voederrichtlijnenController extends Controller
{
    public function voederrichtlijnen(){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsRichtlijnen = VoedingsRichtlijnen::all();
                return view('voedingsrichtlijnenAdmin', 
                ['voedingsRichtlijnen' => $voedingsRichtlijnen]);
            }
            else{
                abort(401);
            }
        }
    }

    public function addeditVoederrichtlijn(Request $request){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                try {
                    $c = strtoupper(trim($request->input('color'), "#"));
                    $id = $request->input('id');
                    $n = $request->input('name');
                    $i = $request->input('icon');
                    $type = $request->input('typesubmit');
                    if (!DB::table('voedingsrichtlijnen') -> where([
                        ['name', '=', $n],
                        ['icon', '=', $i],
                        ['color', '=', $c],
                    ])->exists()) {
                        if ($type == "add") {
                           $voedingsrichtlijn = new VoedingsRichtlijnen;
                            $voedingsrichtlijn->name = $n;
                            $voedingsrichtlijn->icon = $i;
                            $voedingsrichtlijn->color = $c;
                            $voedingsrichtlijn->save();
                        } elseif ($type == "edit") {
                            $voedingsrichtlijn = VoedingsRichtlijnen::find($id);
                            $voedingsrichtlijn->name = $n;
                            $voedingsrichtlijn->icon = $i;
                            $voedingsrichtlijn->color = $c;
                            $voedingsrichtlijn->save();
                        }
                    } else {
                        return back()->with('error', 'Deze combinatie bestaat al!');;
                    }
                    return back();
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                }
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
                try {
                    VoedingsRichtlijnen::destroy($id);
                    return back();
                } catch (QueryException $e) {
                    if ($e->errorInfo[1] === 1451) { // check for specific error code
                        return back()->with('error', 'Kan deze voederrichtlijn niet verwijderen omdat er nog voedselsoorten inzitten.');
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
    public function editVoederrichtlijn($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $voedingsRichtlijn = VoedingsRichtlijnen::find($id);
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
                try {
                    $voedingsrichtlijn = VoedingsRichtlijnen::find($id);
                    $voedingsrichtlijn->name = $request('name');
                    $voedingsrichtlijn->icon = $request('icon');
                    $voedingsrichtlijn->color = $request('color');
                    $voedingsrichtlijn->save();
                    return redirect('./voedingsrichtlijnenadmin');
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred (', $e->errorInfo[1] ,') while processing your request.');
                }
            }
            else{
                abort(401);
            }
        }
    }
}
