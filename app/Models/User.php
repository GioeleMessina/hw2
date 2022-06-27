<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model{
    
    protected $table="utenti";
    protected $primaryKey = "userID";
    protected $autoIncrement = false;
    protected $keyType = "string";
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
        'pass', 'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    // Campi diversi da questi non verranno inseriti nel database. Serve ad evitare che un utente possa aggiornare campi che 
    // non dovrebbe, es: is_admin
    protected $fillable = [
        'userID', 'pass', 'email', 'nome', 'cognome'
    ];

    public function preferiti(){
        return $this->hasMany('App\Models\Preferiti','userID');
    }
    public function store(){
        return $this->hasMany('App\Models\Store','userID');
    }
    
}



?>