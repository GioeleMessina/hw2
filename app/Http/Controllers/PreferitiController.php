<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Preferiti;
use App\Models\User;

class PreferitiController extends Controller {

    public function index() {
        $session=session('username');
        $user = User::find($session);
        if (!isset($user))
            return view('login');
        return view("preferiti")->with("username", $user);
    }

    

    public function aggiungiPreferiti(){
        
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }

        $preferiti_esistente= $user->preferiti()->where('titolo', request('titolo'))->first();
        if($preferiti_esistente != null) {
            $response=array("aggiunto"=>false);
            return $response;
        }
        else{
            $preferiti= new Preferiti;
            $preferiti->userID=$user['userID'];
            $preferiti->titolo=request('titolo');
            $preferiti->copertina=request('copertina');
            $preferiti->save();

            if($preferiti){
                $response=array("aggiunto"=>true);
            }else{
                $response=array("aggiunto"=>false);
            }
            return $response;
        }
            
    }

    public function rimuoviPreferiti($titolo){
         
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        
        $preferiti= $user->preferiti()->where('titolo', $titolo)->first();
        if($preferiti){
            $preferiti->delete();
            $response=array("rimosso"=>true);
            return $response;
        }else{
            $response=array("rimosso"=>false);;
            return $response;
        }
  

    
    }

    public function mostraPreferiti(){

        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        return $user->preferiti()->get();
    }
}
?>