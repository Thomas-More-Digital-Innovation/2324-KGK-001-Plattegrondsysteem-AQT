<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProtocolType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function account(){
        if(Auth::id()){
            return redirect('/profile');
        }
    }

    public function students(){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
               $users = DB::table('users')->get();
               return view('AdminDashboard', ['users' => $users]);
            }
            else{
               abort(401);
            }
        }
    }

    public function addUser(Request $request){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $username = array($request->input('firstname'), "." , $request->input('lastname'));
                $email = array($request->input('firstname'),'.',$request->input('lastname'),'@email.com');

                $query = DB::table('users')->insert([
                    'firstname'=>$request->input('firstname'),
                    'lastname'=>$request->input('lastname'),
                    'username'=>str_replace(" ", "" ,join("", $username)),
                    'email'=>str_replace(" ", "" ,join("", $email)),
                    'password'=> Hash::make('1234'),
                    'roleid'=>$request->input('role')
                ]);
                return back();
            }
            else{
                abort(401);
            }
        }       
    }

    public function deleteUser($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $user = User::find($id);
                $user->delete();
                return back();
            }
            else{
                abort(401);
            }
        }
    }

    public function editUser($id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $user = User::find($id);

                return view('editUser', compact('user'));
            }
            else{
                abort(401);
            }
        }
    }

    public function updateUser(Request $request, $id){
        if(Auth::id()){
            $roleID=Auth()->user()->roleid;
            if($roleID==4){
                $user = User::find($id);
                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->username = $request->input('username');
                if($request->input('password') == true){
                    $user->password = Hash::make('1234');
                }
                $user->roleid = $request->input('role');
                $user->update();
                return redirect('/students');
            }
            else{
                abort(401);
            }
        }
    }

    // Home page?
    public function index(){
        return view('home');
    }

    // Admin homepage
    public function adminhome(){
        if(Auth::id()){
            $roleID = Auth()->user()->roleid;
            if($roleID==4){ return view('components.pages.adminhome'); }
            else{
                abort(401);
            }
        }
    }
}
