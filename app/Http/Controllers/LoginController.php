<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function login() {
        if(session('username') != null) {
            return redirect("home");
        }
        else {
            return view('login')->with('csrf_token', csrf_token());
        }
     }

     public function checkLogin() {
        
         $user = User::where('userID', request('user'))->first();
         
         if($user!=null && $user['userID']==request('user') && password_verify(request('password'),$user['pass'])) {
            Session::put('username', $user->userID);

            return redirect('home');
         }
         else {
            return view('login')->with(['error' => 'Credenziali errate']);   
         }
     }

     public function logout() {
         Session::flush();
         return redirect('login');
     }
}
?>