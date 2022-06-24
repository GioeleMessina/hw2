<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\GameList;

class MiaLibreriaController extends Controller {

    public function index() {
        $session=session('username');
        $user = User::find($session);
        if (!isset($user))
            return view('login');
        return view("miaLibreria");
    }


    public function aggiungiLibreria(){
        
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }

            $listaGiochi=new GameList;
            $listaGiochi->userID=$user['userID'];
            $listaGiochi->titolo=request('titolo');
            $listaGiochi->copertina=request('copertina');
            $listaGiochi->save();
            $response=array("aggiunto"=>true);

            return $response;
        


    }


    public function rimuoviLibreria($titolo){
         
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        
        $listaGiochi= GameList::where('userID',$session)->where('titolo', $titolo)->first();
        if($listaGiochi){
            $listaGiochi->delete();
            $response=array("rimosso"=>true);
            return $response;
        }else{
            $response=array("rimosso"=>false);;
            return $response;
        }
  

    
    }

    public function mostraLibreria(){

        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        return GameList::where('userID',$session)->get();
        
    }
}


?>