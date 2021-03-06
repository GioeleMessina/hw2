<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;

class HomeController extends Controller {

    public function index() {
        $session=session('username');
        $user = User::find($session);
        if (!isset($user))
            return view('login');
        
        return view("home");
    }
}
?>