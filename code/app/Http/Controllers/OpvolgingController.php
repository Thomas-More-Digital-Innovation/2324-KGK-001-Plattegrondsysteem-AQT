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
}
