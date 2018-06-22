<?php

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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/init/admin','InitController@addAdmin');    //Obrisiati u production verziji
Route::get('/init/users','InitController@addUsers');    //Obrisiati u production verziji


Route::get('/korisnik/dodaj','KorisnikController@_dodaj');
Route::post('/korisnik/dodaj','KorisnikController@dodaj');
Route::get('/korisnici','KorisnikController@prikaziSve');
Route::get('/korisnik/{id}','KorisnikController@prikazi');
Route::get('/korisnik/{id}/izmeni','KorisnikController@_izmeni');
Route::post('/korisnik/izmeni','KorisnikController@izmeni');
Route::get('/korisnik/{id}/obrisi','KorisnikController@obrisi');
Route::get('avatar/{filename}', 'FileController@getAvatar')->where('filename', '^[^/]+$');
Route::get('/korisnik/dajKorisnika/{id}','KorisnikController@dajKorisnika');

Route::get('/akcija/kreiraj','AkcijaController@_kreiraj');
Route::post('/akcija/kreiraj','AkcijaController@kreiraj');
Route::get('/akcije','AkcijaController@prikaziSve');
Route::get('/akcija/{id}','AkcijaController@prikazi');
Route::get('/akcija/{id}/izmeni','AkcijaController@_izmeni');
Route::post('/akcija/izmeni','AkcijaController@izmeni');

Route::get('/magacin/dodaj','MagacinController@_dodaj');
Route::post('/magacin/dodaj','MagacinController@dodaj');
Route::get('/magacin','MagacinController@prikaziSve');
Route::get('/magacin/{id}/izmeni','MagacinController@_izmeni');
Route::post('/magacin/izmeni','MagacinController@izmeni');
Route::get('/magacin/{id}/obrisi','MagacinController@obrisi');
Route::get('/magacin/{id}','MagacinController@prikazi');
Route::get('/magacin/o/zaduzi','MagacinController@_zaduzi');
Route::post('/magacin/o/zaduzi','MagacinController@zaduzi');
Route::get('/magacin/o/zahtevi','MagacinController@_zahtevi');
Route::get('/magacin/o/kolikoZahteva','MagacinController@kolikoZahteva');
Route::get('/magacin/zahtev/{id}','MagacinController@prikaziZahtev');
Route::get('/magacin/zahtev/{id}/odobri','MagacinController@odobriZahtev');
Route::get('/magacin/zahtev/{id}/odbij','MagacinController@odbijZahtev');
Route::get('/magacin/zahtev/{id}/vrati','MagacinController@vratiOpremu');
Route::get('/magacin/dajOpremu/{id}','MagacinController@dajOpremu');

Route::get('/poruka/{id}/obrisi','PorukaController@obrisi');

Route::get('/povrednaLista/izradi','PovrednaListaController@_izradi');
Route::post('/povrednaLista/izradi','PovrednaListaController@izradi');
Route::get('/povredneListe','PovrednaListaController@prikaziSve');
Route::get('/povrednaLista/{id}','PovrednaListaController@prikazi');
