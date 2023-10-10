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
         if( $roleID==4 ) { return view('components.opvolging.opvolginghome'); }
         else { abort(401); }
      }
   }
   public function addopvolging(Request $request){
      if(Auth::id()){
         $roleID=Auth()->user()->roleid;
         if( $roleID==4 ) { 
            DB::table('dierprotocol')->insert([
               'protocoldetailid'=>$request->input('protocolselect'),
               'diersoortid'=>$request->input('diersoortselect')
            ]);
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
