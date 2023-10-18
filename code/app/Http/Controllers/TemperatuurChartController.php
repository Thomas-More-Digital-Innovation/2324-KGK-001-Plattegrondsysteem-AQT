<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TemperatuurChartController extends Controller
{
    public function temperatuurLineChart()
    {
        $dierid = 2;
        $result = DB::select("SELECT dierid, temperatuur, CONCAT(DAY(datetime), '-', MONTH(datetime)) AS dag_maand, temperatuur FROM checkitem WHERE temperatuur IS NOT NULL and dierid LIKE $dierid");
        $data = "";
        foreach($result as $val){
            $data.="['".$val->dag_maand."', ".$val->temperatuur.",],";
        }
        
        return view('temperatuurlinechart',compact('data'));
    }
}
