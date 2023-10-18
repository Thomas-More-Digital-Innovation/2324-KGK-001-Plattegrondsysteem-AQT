<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class medischeFicheController extends Controller
{
    
    public function fichesubmit(Request $request)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4 || $roleID==3){
                
                $date = $request->input('date');
                               
                $filename = $request->file('file')->getClientOriginalName();
                $file = $request->file('file')->storeAs('/files', $filename, 'public_uploads');
            
                DB::table('medischefiche')->insert([
                    'date' => $date,
                    'file' => $file,
                ]);
            
                return redirect('medischeFiche');

            }
            else{
                abort(401);
            }
        }
    }
    
    public function index()
    {
        $medischefiche = DB::table('medischefiche')->get();
        return view('medischeFiche', ['medischefiche' => $medischefiche]);
    }

    public function fichedelete($id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                DB::table('medischefiche')->where('id', $id)->delete();
        
                return redirect('medischefiche');

            }
            else{
                abort(401);
            }
        }
    }

}
