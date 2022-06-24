<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});



Route::get('/registrazione',"SignupController@index")->name('registrazione');
Route::post('/registrazione',"SignupController@create");

Route::get('/registrazione/email/{email}',"SignupController@checkEmail");
Route::get('/registrazione/username/{username}',"SignupController@checkUsername");

Route::post("/login","LoginController@checkLogin");
Route::get("/login","LoginController@login")->name("login");
Route::get("/logout","LoginController@logout")->name("logout");

Route::get('/home',"HomeController@index")->name('home');
Route::get('/cercaGiochi',"CercaGiochiController@index")->name('cercaGiochi');
Route::get('/shop',"ShopController@index")->name('shop');
Route::get('/carrello',"CarrelloController@index")->name('carrello');
Route::get('/preferiti',"PreferitiController@index")->name('preferiti');
Route::get('/miaLibreria',"miaLibreriaController@index")->name('miaLibreria');

Route::post('/miaLibreria/add',"miaLibreriaController@aggiungiLibreria");
Route::get('/miaLibreria/remove/{titolo}',"miaLibreriaController@rimuoviLibreria");
Route::post('/preferiti/add',"PreferitiController@aggiungiPreferiti");
Route::get('/preferiti/remove/{titolo}',"PreferitiController@rimuoviPreferiti");
Route::post('/carrello/add',"CarrelloController@aggiungiCarrello");
Route::get('/carrello/remove/{id}',"CarrelloController@rimuoviCarrello");

Route::get('/api/home/{page}',"ApiController@topGames");
Route::get('/api/shop/{titolo}',"ApiController@shop");
Route::get('/api/cercaGiochi/{genere}/{piattaforma}/{page}',"ApiController@cercaGiochi");

Route::get('/miaLibreria/mostraLibreria',"miaLibreriaController@mostraLibreria");
Route::get('/preferiti/mostraPreferiti',"PreferitiController@mostraPreferiti");
Route::get('/carrello/mostraCarrello',"CarrelloController@mostraCarrello");

Route::get('/carrello/calcolaCostoCarrello',"CarrelloController@calcolaCostoCarrello");
