<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DierController extends Controller
{
    public function viewinput()
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
            }
            else{
                abort(401);
            }
        }

        $werkplek = DB::table('werkplek')->get();
        $diersoort = DB::table('diersoort')->get();
        $inventaris = DB::table('inventaris')->get();
        
        return view('dier-input', compact('werkplek', 'diersoort', 'inventaris'));
    }
    
    public function diersubmit(Request $request)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
            }
            else{
                abort(401);
            }
        }

        $werkplek = $request->input('werkplek');
        $diersoort = $request->input('diersoort');
        $quarantaine = $request->input('quarantaine');
        $inventaris = $request->input('inventaris');
            
        DB::table('dier')->insert([
            'werkplekid' => $werkplek,
            'diersoortid' => $diersoort,
            'quarantaine' => $quarantaine,
            'inventarisid' => $inventaris,
        ]);
    
        return redirect('dier');
    }

    public function index()
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $dieren = DB::table('dier')
                ->join('werkplek', 'dier.werkplekid', '=', 'werkplek.id')
                ->join('diersoort', 'dier.diersoortid', '=', 'diersoort.id')
                ->select('dier.id', 'werkplek.name as werkplekName', 'diersoort.name as diersoortName', 'dier.quarantaine', 'dier.inventarisid')
                ->orderBy('dier.id')
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
                if (DB::table('checkitem')->where('dierid', $id)->exists()) {DB::table('checkitem')->where('dierid', $id)->delete();}
                if (DB::table('comment')->where('dierid', $id)->exists()) {DB::table('comment')->where('dierid', $id)->delete();}
                DB::table('dier')->where('id', $id)->delete();
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
                
                $werkplek = DB::table('werkplek')->get();
                $diersoort = DB::table('diersoort')->get();
                $inventaris = DB::table('inventaris')->get();
                
                $dierEdit = DB::table('dier')
                ->join('werkplek', 'dier.werkplekid', '=', 'werkplek.id')
                ->join('diersoort', 'dier.diersoortid', '=', 'diersoort.id')
                ->select('dier.id as id', 'werkplek.id as werkplekId', 'diersoort.id as diersoortId', 'dier.quarantaine', 'dier.inventarisid')
                ->where('dier.id', $id)
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
                    
                DB::table('dier')
                    ->where('id', $id)
                    ->update([
                        'werkplekid' => $werkplek,
                        'diersoortid' => $diersoort,
                        'quarantaine' => $quarantaine,
                        'inventarisid' => $inventaris,
                    ]);
            
                return redirect('dier');

            }
            else{
                abort(401);
            }
        }
    }
}
