<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OpvolgingController extends Controller
{
   public function opvolging(){
      if(Auth::id()){
         $roleID=Auth()->user()->roleid;
         if( $roleID==4 ) { 
            $info = DB::table('dierprotocol')
            ->join('protocoldetail', 'dierprotocol.protocoldetailid', '=', 'protocoldetail.id')
            ->get();
            
            $info2 = DB::table('dierprotocol')
            ->join('diersoort', 'dierprotocol.diersoortid', '=', 'diersoort.id')
            ->get();
    
            $infoProtocols = DB::table('protocoldetail')->get();
            
            $infoDiersoorten = DB::table('diersoort')->get();

            return view('components.opvolging.opvolginghome', ['protocoldetail' => $info, 'diersoort' => $info2, "protocols" => $infoProtocols, "diersoorten" => $infoDiersoorten]); }
         else { abort(401); }
      }
   }
    public function addeditopvolging(Request $request){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if( $roleID==4 ) {
                $ps = $request->input('protocolselect');
                $ds = $request->input('diersoortselect');
                $oldps = $request->input('oldps');
                $oldds = $request->input('oldds');
                if (!DB::table('dierprotocol')->where([
                    ['protocoldetailid', '=', $ps],
                    ['diersoortid', '=', $ds],
                ])->exists()) {
                    if ($request->input('typesubmit') == "add") {
                        DB::table('dierprotocol')->insert([
                            'protocoldetailid'=>$ps,
                            'diersoortid'=>$ds,
                        ]);
                    } elseif ($request->input('typesubmit') == "edit") {
                        DB::table('dierprotocol')
                        ->where([
                            ["protocoldetailid", "=", $oldps],
                            ["diersoortid", "=", $oldds]
                        ])
                        ->update([
                            "protocoldetailid"=>$ps,
                            "diersoortid"=>$ds
                        ]);
                    }
                } else {
                    return back()->with('error', 'Deze combinatie bestaat al!');
                }
                return back();
            }
            else { abort(401); }
        }
    }
   public function deleteopvolging($protocoldetailid, $diersoortid){
      if(Auth::id()){
         $roleID=Auth()->user()->roleid;
         if( $roleID==4 ) { 
            DB::table('dierprotocol')->where([
               ['protocoldetailid', '=', $protocoldetailid],
               ['diersoortid', '=', $diersoortid],
            ])->delete();
            return back();
         }
         else { abort(401); }
      }
   }
}
