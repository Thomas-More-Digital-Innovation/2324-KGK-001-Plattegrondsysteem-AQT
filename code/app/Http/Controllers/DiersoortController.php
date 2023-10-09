<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DiersoortController extends Controller
{
    
    public function diersoortsubmit(Request $request)
    {
        $name = $request->input('name');
        $latinname = $request->input('latinname');
        
        $fotoname = $request->file('foto')->getClientOriginalName();
        $foto = $request->file('foto')->storeAs('/images', $fotoname, 'public_uploads');
        
        $filename = $request->file('file')->getClientOriginalName();
        $file = $request->file('file')->storeAs('/files', $filename, 'public_uploads');
    
        DB::table('diersoort')->insert([
            'name' => $name,
            'latinname' => $latinname,
            'foto' => $foto,
            'file' => $file,
        ]);
    
        return redirect('/dierensoorten');
    }
    
    public function index()
    {
        $dierensoorten = DB::table('diersoort')->get();
        return view('dierensoorten', ['dierensoorten' => $dierensoorten]);
    }

    public function destroy($id)
    {
        $used = DB::table('dier')->where('diersoortid', $id)->exists() || DB::table('dierprotocol')->where('diersoortid', $id)->exists();

        if ($used) {
            
            DB::table('dier')->where('diersoortid', $id)->delete();
            DB::table('dierprotocol')->where('diersoortid', $id)->delete();
            DB::table('diersoort')->where('id', $id)->delete();

        } else {
            DB::table('diersoort')->where('id', $id)->delete();
        }

        return redirect('/dierensoorten');
    }
}
