<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\DierProtocol;

use App\Models\ProtocolDetail;
use App\Models\Diersoort;

class OpvolgingController extends Controller
{
   public function opvolging(){
      if(Auth::id()){
         $roleID=Auth()->user()->roleid;
         if( $roleID==4 ) { 
            $info = DierProtocol::join('protocoldetail', 'dierprotocol.protocoldetailid', '=', 'protocoldetail.id')
            ->get();
            
            $info2 = DierProtocol::join('diersoort', 'dierprotocol.diersoortid', '=', 'diersoort.id')
            ->get();
    
            $infoProtocols = ProtocolDetail::all();
            
            $infoDiersoorten = Diersoort::all();

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
                if (!DierProtocol::where([
                    ['protocoldetailid', '=', $ps],
                    ['diersoortid', '=', $ds],
                ])->exists()) {
                    if ($request->input('typesubmit') == "add") {
                        DierProtocol::create([
                            'protocoldetailid'=>$ps,
                            'diersoortid'=>$ds,
                        ]);
                    } elseif ($request->input('typesubmit') == "edit") {
                        DierProtocol::where([
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
            DierProtocol::where([
               ['protocoldetailid', '=', $protocoldetailid],
               ['diersoortid', '=', $diersoortid],
            ])->delete();
            return back();
         }
         else { abort(401); }
      }
   }
}
