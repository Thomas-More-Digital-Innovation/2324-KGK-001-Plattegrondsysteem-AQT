<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Medischefiche;

class medischeFicheController extends Controller
{
    
    public function fichesubmit(Request $request)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4 || $roleID==3){
                
                $date = $request->input('date');

                if ($request->file('file')->getSize() > 3145728) {
                    return redirect()->back()->with('error', 'Het bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                }
                else {                   

                    $filename = $request->file('file')->getClientOriginalName();
                    $file = $request->file('file')->storeAs('./files', $filename, 'public_uploads');

                    $newMedischeFiche = new Medischefiche;
                    $newMedischeFiche->date = $date;
                    $newMedischeFiche->file = $file;
                    $newMedischeFiche->save();
                                    
                    return redirect('medischefiche');
                }
            }
            else{
                abort(401);
            }
        }
    }
    
    public function index()
    {
        $medischefiche = Medischefiche::all();
        return view('medischeFiche', ['medischefiche' => $medischefiche]);
    }

    public function fichedelete($id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                Medischefiche::where('id', $id)->delete();
        
                return redirect('medischefiche');

            }
            else{
                abort(401);
            }
        }
    }

}
