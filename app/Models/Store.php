<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Store extends Model{
    protected $table="store";
    protected $primaryKey ='ordine';
    public $timestamps = false;

        /** *
     * The attributes that are mass assignable.
     *
     * @var array
     */


    /** 
     *The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // Campi che non verranno ritornati da query sul database, per evitare di mostrare contenuti sensibili o 
    // per non ritornare cose che non verranno attivamente utilizzate lato client
    protected $hidden = [
        'userID'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    // Campi diversi da questi non verranno inseriti nel database. Serve ad evitare che un utente possa aggiornare campi che 
    // non dovrebbe, es: is_admin
    protected $fillable = ['userID', 'copertina', 'titolo', 'costo','idGioco','ordine'];


    public function utenti(){
    return $this->belongsTo('App\Models\User');
    }
    
}



?>