<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function account(){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;

            if($roleID==4){
                $users = DB::table('users')->get();

                return view('AdminDashboard', ['users' => $users]);
            }
            else if($roleID==2){
                return view('dashboard');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function index(){
        return view('home');
    }
}
