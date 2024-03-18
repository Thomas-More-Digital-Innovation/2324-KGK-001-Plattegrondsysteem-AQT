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
            $roleID = Auth::user()->roleid;
            if($roleID == 4){
                $validatedData = $request->validate([
                    'color' => 'required|string|max:255',
                    'id' => 'sometimes|integer',
                    'name' => 'required|string|max:255',
                    'icon' => 'required|string|max:255',
                    'typesubmit' => 'required|in:add,edit',
                ]);
    
                try {
                    $c = strtoupper(trim($validatedData['color'], "#"));
                    $id = $validatedData['id'];
                    $n = $validatedData['name'];
                    $i = $validatedData['icon'];
                    $type = $validatedData['typesubmit'];
    
                    $existingRecord = VoedingsRichtlijnen::where('name', $n)
                                            ->where('icon', $i)
                                            ->where('color', $c)
                                            ->exists();
    
                    if (!$existingRecord) {
                        if ($type == "add") {
                            $voedingsrichtlijn = new VoedingsRichtlijnen;
                            $voedingsrichtlijn->name = $n;
                            $voedingsrichtlijn->icon = $i;
                            $voedingsrichtlijn->color = $c;
                            $voedingsrichtlijn->save();
                        } elseif ($type == "edit") {
                            $voedingsrichtlijn = VoedingsRichtlijnen::findOrFail($id);
                            $voedingsrichtlijn->name = $n;
                            $voedingsrichtlijn->icon = $i;
                            $voedingsrichtlijn->color = $c;
                            $voedingsrichtlijn->save();
                        }
                    } else {
                        return back()->with('error', 'Deze combinatie bestaat al!');
                    }
                    return back();
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred ('. $e->errorInfo[1] .') while processing your request.');
                }
            } else {
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
    public function updateVoederrichtlijn($id){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID == 4){
                try {
                    $voedingsrichtlijn = VoedingsRichtlijnen::find($id);
                    $voedingsrichtlijn->name = request()->input('name'); // Using request() helper instead of accessing $id directly
                    $voedingsrichtlijn->icon = request()->input('icon'); // Using request() helper instead of accessing $id directly
                    $voedingsrichtlijn->color = request()->input('color'); // Using request() helper instead of accessing $id directly
                    $voedingsrichtlijn->save();
                    return redirect('./voedingsrichtlijnenadmin');
                } catch (QueryException $e) {
                    return back()->with('error', 'An error occurred ('. $e->errorInfo[1] .') while processing your request.'); // Fixing the error message concatenation
                }
            }
            else{
                abort(401);
            }
        }
    }
}