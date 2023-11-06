<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WerkplekController extends Controller
{
    public function index()
    {
        $id = request('id');
        $clickedName = $id;

        $werkplek = DB::table('werkplek')->where('name', $clickedName)->first();
        $werkplekId = $werkplek->id;
            
        $dierSoortList = DB::table('diersoort')
            ->join('dier', 'dier.diersoortid', '=', 'diersoort.id')
            ->where('dier.werkplekid', $werkplekId)
            ->get();

        $werkplek = DB::table('werkplek')->get();
        return view('werkplek', ['werkplek' => $werkplek, 'werkplekId' => $werkplekId, 'dierSoortList' => $dierSoortList]);
    }
}