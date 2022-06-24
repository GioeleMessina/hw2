<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Store;


class CarrelloController extends Controller {

    public function index() {
        $session=session('username');
        $user = User::find($session);
        if (!isset($user))
            return view('login');
        return view("carrello")->with("username", $user);
    }

    
    public function aggiungiCarrello(){
        
        header('Content-Type: application/json');
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        $carrello_esistente= $user->store()->where('idGioco',request('idGioco'))->first();
        if($carrello_esistente != null) {
            $response=array("aggiunto"=>false);
            return $response;
        }else{
            $carrello= new Store;
            $carrello->userID=$user['userID'];
            $carrello->titolo=request('titolo');
            $carrello->copertina=request('copertina');
            $carrello->idGioco=request('idGioco');
            $carrello->costo=request('costo');
            $carrello->save();   
            if($carrello){
                $response=array("aggiunto"=>true);
            }else{
                $response=array("aggiunto"=>false);
            }
            return $response;
        }
    
    }

    public function rimuoviCarrello($id){
       
        header('Content-Type: application/json');
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        
        $carrello= $user->store()->where('idGioco', $id)->first();
        if($carrello){
            $carrello->delete();
            $response=array("rimosso"=> true);
            return $response;
        }else{
            $response=array("rimosso"=>false);;
            return $response;
        }
  

    
    }

    public function mostraCarrello(){

        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        return $user->store()->get();
    }


    public function calcolaCostoCarrello(){
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        $carrello= $user->store()->get();
        $costoTot=0;
        foreach($carrello as $element){
            $costoTot+=substr($element->costo,1);
        }
         return $costoTot;
    }

}

?>