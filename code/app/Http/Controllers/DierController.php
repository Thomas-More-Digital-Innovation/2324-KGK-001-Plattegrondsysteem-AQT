<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Checkitem;
use App\Models\Comment;
use App\Models\Werkplek;
use App\Models\Dier;
use App\Models\Diersoort;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Auth;

class DierController extends Controller
{
    public function viewinput()
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $werkplek = Werkplek::get();
                $diersoort = Diersoort::get();
                $inventaris = Inventaris::get();
                
                return view('dier-input', compact('werkplek', 'diersoort', 'inventaris'));

            }
            else{
                abort(401);
            }
        }
    }
    
    public function diersubmit(Request $request)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $werkplek = $request->input('werkplek');
                $diersoort = $request->input('diersoort');
                $quarantaine = $request->input('quarantaine');
                $inventaris = $request->input('inventaris');
                
                $newDier = new Dier;
                $newDier->werkplekid = $werkplek;  
                $newDier->diersoortid = $diersoort;
                $newDier->quarantaine = $quarantaine;
                $newDier->inventarisid = $inventaris;
                $newDier->save();
            
                return redirect('dier');

            }
            else{
                abort(401);
            }
        }
    }

    public function index()
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $dieren = Dier::join('werkplek', 'diers.werkplekid', '=', 'werkplek.id')
                ->join('diersoort', 'diers.diersoortid', '=', 'diersoort.id')
                ->select('diers.id', 'werkplek.name as werkplekName', 'diersoort.name as diersoortName', 'diers.quarantaine', 'diers.inventarisid')
                ->orderBy('diers.id')
                ->get();
        
                return view('dier', compact('dieren'));

            }
            else{
                abort(401);
            }
        }
    }

    public function dierVerwijderen($id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                if (Checkitem::where('dierid', $id)->exists()) {Checkitem::where('dierid', $id)->delete();}
                if (Comment::where('dierid', $id)->exists()) {Comment::where('dierid', $id)->delete();}

                Dier::where('id', $id)->delete();
                return redirect('dier');
            }
            else{
                abort(401);
            }
        }
    }

    public function diersoortedit($id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $werkplek = Werkplek::get();
                $diersoort = Diersoort::get();
                $inventaris = Inventaris::get();

                $dierEdit = Dier::join('werkplek', 'diers.werkplekid', '=', 'werkplek.id')
                ->join('diersoort', 'diers.diersoortid', '=', 'diersoort.id')
                ->select(
                    'diers.id as id', 
                    'werkplek.id as werkplekId', 
                    'diersoort.id as diersoortId', 
                    'diers.quarantaine', 
                    'diers.inventarisid'
                )
                ->where('diers.id', $id)
                ->first();

                return view('dier-edit', compact('dierEdit', 'werkplek', 'diersoort', 'inventaris'));

            }
            else{
                abort(401);
            }
        }
    }

    public function dierupdate(Request $request, $id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $werkplek = $request->input('werkplek');
                $diersoort = $request->input('diersoort');
                $quarantaine = $request->input('quarantaine');
                $inventaris = $request->input('inventaris');

                $UpdateDier = Dier::find($id);
                $UpdateDier->werkplekid = $werkplek;
                $UpdateDier->diersoortid = $diersoort;
                $UpdateDier->quarantaine = $quarantaine;
                $UpdateDier->inventarisid = $inventaris;
                $UpdateDier->save();
            
                return redirect('dier');

            }
            else{
                abort(401);
            }
        }
    }
}
