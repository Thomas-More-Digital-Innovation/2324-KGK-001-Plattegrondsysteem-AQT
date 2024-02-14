<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DiersoortController extends Controller
{
    
    public function diersoortsubmit(Request $request)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
            
                // Haal de ingevoerde gegevens op
                $name = $request->input('name');
                $latinname = $request->input('latinname');

                if ($request->file('foto')->getSize() > 3145728 || $request->file('file')->getSize() > 3145728) {
                    return redirect()->back()->with('error', 'Eén van de bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                }
                else {

                    // Verwerk de bestande
                    if($request->hasFile('foto')){
                        $fotoname = $request->file('foto')->getClientOriginalName();
                        $foto = $request->file('foto')->storeAs('/images', $fotoname, 'public_uploads');          
                    }
                    
                    if ($request->hasFile('file')){ 
                        $filename = $request->file('file')->getClientOriginalName();
                        $file = $request->file('file')->storeAs('/files', $filename, 'public_uploads');
                    }
                    
                    // Voeg gegevens toe aan de database
                    DB::table('diersoort')->insert([
                        'name' => $name,
                        'latinname' => $latinname,
                        'foto' => $foto,
                        'file' => $file,
                    ]);
            
                    return redirect('dierensoorten');
                }

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
                
                $dierensoorten = DB::table('diersoort')->get();
                return view('dierensoorten', ['dierensoorten' => $dierensoorten]);

            }
            else{
                abort(401);
            }
        }
    }

    public function destroy($id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $usedDier = DB::table('diers')->where('diersoortid', $id)->exists();
                $usedDierprotocol = DB::table('dierprotocol')->where('diersoortid', $id)->exists();
                if (DB::table('checkitem')->where('dierid', $id)->exists()) {DB::table('checkitem')->where('dierid', $id)->delete();}
                if (DB::table('comment')->where('dierid', $id)->exists()) {DB::table('comment')->where('dierid', $id)->delete();}
                if ($usedDier && $usedDierprotocol) {
                    
                    DB::table('diers')->where('diersoortid', $id)->delete();
                    DB::table('dierprotocol')->where('diersoortid', $id)->delete();
                    DB::table('diersoort')->where('id', $id)->delete();
        
                } elseif ($usedDier && $usedDierprotocol == False) {
                    DB::table('diers')->where('diersoortid', $id)->delete();
                    DB::table('diersoort')->where('id', $id)->delete();
                } elseif ($usedDier  == False && $usedDierprotocol) {
                    DB::table('diersoort')->where('id', $id)->delete();
                    DB::table('dierprotocol')->where('diersoortid', $id)->delete();
                } else {
                    DB::table('diersoort')->where('id', $id)->delete();
                }
        
                return redirect('dierensoorten');

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
                
                $diersoortEdit = DB::table('diersoort')->where('id', $id)->first();
                return view('diersoort-edit', compact('diersoortEdit'));

            }
            else{
                abort(401);
            }
        }
    }

    public function diersoortupdate(Request $request, $id)
    {
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                
                $fotonew = false;
                $filenew = false;
                
                $name = $request->input('name');
                $latinname = $request->input('latinname');
        
                $foto = $request->input('fotoOld');
                $file = $request->input('fileOld');
              
                if($request->hasFile('foto')){
                    $foto = $request->file('foto'); 
                    $fotonew = true; 
                    if ($foto->getSize() > 3145728) {
                        return redirect()->back()->with('error', 'Eén van de bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                    }        
                }

                if ($request->hasFile('file')){ 
                    $file = $request->file('file');
                    $filenew = true; 
                    if ($file->getSize() > 3145728) {
                        return redirect()->back()->with('error', 'Eén van de bestanden overschrijdt de limiet van 3 MB in bestandsgrootte.');
                    }   
                }
                
                if($fotonew == true){
                    $fotoname = $request->file('foto')->getClientOriginalName();
                    $foto = $request->file('foto')->storeAs('/images', $fotoname, 'public_uploads');          
                }
                
                if ($filenew == true){ 
                    $filename = $request->file('file')->getClientOriginalName();
                    $file = $request->file('file')->storeAs('/files', $filename, 'public_uploads');
                }
                
                DB::table('diersoort') 
                    ->where('id', $id)
                    ->update([
                        'name' => $name,
                        'latinname' => $latinname,
                        'foto' => $foto,
                        'file' => $file,
                    ]);
        
                return redirect('dierensoorten');

            }
            else{
                abort(401);
            }
        }
    }
}
