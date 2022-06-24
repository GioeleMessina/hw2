<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class SignupController extends Controller {


    public function index() {
        return view('registrazione');
    } 

    protected function create()
    {
        $request = request();
        
        if($this->countErrors($request) == false) {
            $user =  User::create([
            'userID' => $request['IDuser'],
            'pass' => password_hash($request['password'],PASSWORD_BCRYPT),
            'nome' => $request['nome'],
            'cognome' => $request['cognome'],
            'email' => strtolower($request['email']),
            ]);
            if ($user) {
                Session::put('username', $request['IDuser']);
                return redirect('home');
            } 
            else {
                return redirect('registrazione')->withInput();
            }
        }
        else 
        return redirect('registrazione')->withInput();
        
    }

    private function countErrors($data) {
        $errore=false;

        if(!preg_match('/^[a-zA-Z ]*$/', $data['nome'])|| strlen($data['nome'])==0 ){ 
            $errore=true;
        }
    
        if(!preg_match('/^[a-zA-Z ]*$/', $data['cognome'])|| strlen($data['cognome'])==0){ 
            $errore=true;
        }

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['IDuser']) || strlen($data['IDuser'])==0) {
            $errore=true;
        } else {
            $username = User::where('userID', $data['IDuser'])->first();
            if ($username != null) {
                $errore=true;
            }
        }
        
        if (strlen($data["password"]) < 8) {
            $errore=true;
        } 
        
        if (strcmp($data["password"], $data["ConfermaPassword"]) != 0) {
            $errore=true;
        }
       
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL )|| strlen($data['email'])==0) {
            $errore=true;
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email != null) {
                $errore=true;
            }
        }
        return $errore;
    }

    public function checkUsername($query) {
        $exist = User::where('userID', $query)->exists();
        return ['presente' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['presente' => $exist];
    }


}
?>