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
// HABILITA LA AUTENTIFICACIÓN
Auth::routes();
// HABILITA EL VERIFICADO DE CORREO
Auth::routes(['verify' => true]);

//IGUAL HACE FALTA QUITAR ???
Route::get('adoptar', 'AnunciosController@index')->name('adoptar');
//CONTACTAR Y ENVIAR
Route::get('contactar', 'HomeController@contactar')->name('contactar')->middleware('comprobarCookie');
Route::post('contactar', 'HomeController@enviar')->name('contactar');
// INFORMARSE Y ACEPTAR COOKIES
Route::get('informarse', 'HomeController@info')->name('informarse');
Route::post('informarse', 'HomeController@cookieAceptar')->name('informarse');
// IGUAL HACE FALTA BORRARLA
Route::get('protectoras', 'HomeController@protectoras')->name('protectoras');
// ADMINISTRADOR
Route::resource('administrador', 'AdministradorController');
Route::get('administrador', 'AdministradorController@index')->name('administrador');
Route::get('anunciosVer', 'AdministradorController@anunciosVer')->name('anunciosVerAdmin');
Route::get('usuariosVer', 'AdministradorController@usuariosVer')->name('usuariosVerAdmin');
Route::get('configuracionAdmin', 'AdministradorController@configuracion')->name('configuracionAdmin');
Route::put('configuracionAdmin', 'AdministradorController@configuracion')->name('configuracionAdmin');
Route::put('validarUsuario/{id}', 'AdministradorController@validarUsuario')->name('validarUsuario');
// DARSE DE BAJA
Route::get('darseDeBaja', 'HomeController@darseDeBaja')->name('darseDeBaja');
// USUARIO BÁSICO
Route::resource('usuario', 'UsuarioController');
Route::get('usuario', 'UsuarioController@index')->name('basico');
Route::get('misAnuncios', 'UsuarioController@misAnuncios')->name('misAnuncios');
Route::get('configuracionUsuario', 'UsuarioController@configuracion')->name('configuracionUsuario');
Route::put('configuracionUsuario', 'UsuarioController@configuracion')->name('configuracionUsuario');

// RUTA LO REQUIERE, MEJOR BORRAR
Route::resource('anuncios', 'AnunciosController');
// PÁGINA PRINCIPAL y BUSCAR
Route::get('', 'AnunciosController@index')->name('inicio')->middleware('comprobarCookie');
Route::match(['get', 'post'],'anuncios', 'AnunciosController@index')->name('anuncios');
// CREAR ANUNCIO
Route::post('anuncios/store', 'AnunciosController@store');
// ACCEDER ANUNCIO
Route::get('anuncios/create', 'AnunciosController@create')->middleware('verified');
// AJAX
Route::post('anuncios/fetch', 'AnunciosController@fetch')->name('anuncios.fetch');
// POLITICA DE PRIVACIDAD Y COOKIES
Route::get('privacidad', 'HomeController@privacidad')->name('privacidad');
// AVISO LEGAL
Route::get('aviso', 'HomeController@aviso')->name('aviso');

//RUTA DE PRUEBA DE CORREO
Route::get('enviarVerificacion', ['as' => 'enviar', function () {
 
    $data = ['link' => 'http://styde.net'];
 
    \Mail::send('layouts.paginas.correoVerificacion', $data, function ($message) {
 
        $message->from('email@styde.net', 'Styde.Net');
 
        $message->to('user@example.com')->subject('Notificación');
 
    });
 
    return "Se envío el email";
}]);

//TEST
Route::get('personalizacion', 'TestController@personalizar');
Route::post('personalizacion', 'TestController@guardarpersonalizacion');




