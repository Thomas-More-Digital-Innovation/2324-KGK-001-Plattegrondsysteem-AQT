<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Werkplek;
use App\Models\Diersoort; 

class WerkplekController extends Controller
{
    public function index()
    {
        $id = request('id');
        $clickedName = $id;
        $letters = ['x', 'y'];
        foreach ($letters as $l) {if (str_contains($clickedName, $l)) {$clickedName = str_replace($l, '', $clickedName);};};
        
        $werkplek = Werkplek::where('name', $clickedName)->first();

        $werkplekId = $werkplek->id;
            
        $dierSoortList = Diersoort::join('diers','diers.diersoortid', '=', 'diersoort.id')
        ->where('diers.werkplekid', $werkplekId)
        ->get();

        $werkplek = Werkplek::all();
        return view('werkplek', ['werkplek' => $werkplek, 'werkplekId' => $werkplekId, 'dierSoortList' => $dierSoortList]);
    }
}