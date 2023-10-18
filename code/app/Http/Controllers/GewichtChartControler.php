<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GewichtChartControler extends Controller

{
    public function gewichtLineChart()
    {
        $dierid = 2;
        $result = DB::select("SELECT dierid, gewicht, CONCAT(DAY(datetime), '-', MONTH(datetime)) AS dag_maand, temperatuur FROM checkitem WHERE gewicht IS NOT NULL and dierid LIKE $dierid");
        $gewicht = "";
        foreach($result as $val){
            $gewicht.="['".$val->dag_maand."', ".$val->gewicht.",]";
        }
        return view('components/gewichtlinechart',compact('gewicht'));
    }
}

