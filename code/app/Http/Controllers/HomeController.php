<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

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

    public function addUser(Request $request){
        $username = array($request->input('firstname'), $request->input('lastname'));
        $email = array($request->input('firstname'),'.',$request->input('lastname'),'@email.com');

        $query = DB::table('users')->insert([
            'firstname'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            'username'=>join("", $username),
            'email'=>join("", $email),
            'password'=> Hash::make('1234'),
            'roleid'=>$request->input('role')
        ]);

        return back();
        
    }

    public function index(){
        return view('home');
    }
}
