<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Preferiti;
use App\Models\Store;
use App\Models\GameList;

class ApiController extends Controller {


    function topGames($page){        
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }
        $end_point="https://api.rawg.io/api/games?key=".env('key_api')."&metacritic=90,100&page=".$page."&page_size=12";
        header('Content-Type: application/json');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$end_point);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $json = json_decode($result, true);
        curl_close($curl);

        $nuovoJson=array();


        for($i=0;$i<count($json["results"]);$i++){
            $pref=false;
            $lista=false;
            $preferiti_esistente= $user->preferiti()->where('titolo',  $json['results'][$i]['slug'])->first();
            if($preferiti_esistente != null)
                $pref=true;

            $lista_esistente= GameList::where('userID', $session)->where('titolo',  $json['results'][$i]['slug'])->first();
            if($lista_esistente != null)
                $lista=true;
            $titolo = $json['results'][$i]['slug'];
            $nuovoJson[]=array("Titolo"=>$titolo,"Voto"=>$json['results'][$i]["metacritic"],"Copertina"=>$json['results'][$i]["background_image"],"preferiti"=>$pref,"lista"=>$lista);

        }
        $array=array("PagSucc"=>$json["next"],"PagPrecc"=>$json["previous"],"json"=> $nuovoJson);

        return $array;

    }

    function shop($title){

        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }

        $api_endpoint='https://www.cheapshark.com/api/1.0/games?title='.$title.'&limit=10';
        header('Content-Type: application/json');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$api_endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $json = json_decode($result, true);
        curl_close($curl);

        if(count($json)==0){
            $nuovoJson[]=array("content"=>false);
        }
      
        else{

            for($i=0;$i<count($json);$i++){

               $carrello=false;
               $idGioco = $json[$i]['gameID'];
               $carrello_esistente= $user->store()->where('idGioco', $idGioco)->first();
                  
               if($carrello_esistente){
                  $carrello=true;
               }
                else{
                  $carrello=false;
               }
      
               $nuovoJson[]=array("Titolo"=>$json[$i]["external"],"Prezzo"=>$json[$i]["cheapest"],"Copertina"=>$json[$i]["thumb"],"carrello"=>$carrello,"cheapestDealID"=>$json[$i]["cheapestDealID"],"gameID"=>$idGioco);
               
            }
         } 
         return $nuovoJson;
    }



    function cercaGiochi($genere,$piattaforma,$page){
        $session=session('username');
        $user = User::find($session);
        if (!isset($user)){
            return view('login');
        }

        $end_point='https://api.rawg.io/api/games?key=95623bb7f6264d6d866f005b8a61dc51&page_size=9&genres='.$genere.'&platforms='.$piattaforma.'&page='.$page;
        
        header('Content-Type: application/json');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$end_point);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $json = json_decode($result, true);
        curl_close($curl);

        $nuovoJson=array();


        for($i=0;$i<count($json['results']);$i++) {
            
            $genere=array();
            $piattaforma=array();
            $titolo = $json['results'][$i]['slug'];
            $preferiti_esistente= $user->preferiti()->where('titolo',  $titolo)->first();

            if($preferiti_esistente != null) {
                $pref=true;
            }else{
                $pref=false;
            }

            $lista_esistente= GameList::where('userID', $session)->where('titolo',  $json['results'][$i]['slug'])->first();
            if($lista_esistente != null){
                $lista=true;
            }else{
                $lista=false;
            }
            for($j=0;$j<count($json["results"][$i]["genres"]);$j++){
              
              $gen=$json['results'][$i]["genres"][$j]["name"];
              array_push($genere,$gen);
          
            }
      
            for($j=0;$j<count($json["results"][$i]["platforms"]);$j++){
              $console=$json['results'][$i]["platforms"][$j]["platform"]["name"];
              array_push($piattaforma,$console);
            }
      
            $array[]=array("Genere"=>$genere,"Console"=>$piattaforma,"Titolo"=>$titolo,"Voto"=>$json['results'][$i]["metacritic"],"Copertina"=>$json['results'][$i]["background_image"],"preferiti"=>$pref,"lista"=>$lista);
         }
         $nuovoJson=array("PagSucc"=>$json["next"],"PagPrecc"=>$json["previous"],"json"=> $array);
      
         return $nuovoJson;

    }


       
}
?>