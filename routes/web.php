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

Route::get('/', 'WelcomeController@welcome');

Route::group(['prefix' => 'adminis'], function(){
	Auth::routes();
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('noticia','cateController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('noticia/{id}/update','NoticiaController@update');
  Route::get('noticia/{id}/delete','NoticiaController@destroy');
  Route::get('noticia/{id}/deleteMsg','NoticiaController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('banner','BannerController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('banner/{id}/update','BannerController@update');
  Route::get('banner/{id}/delete','BannerController@destroy');
  Route::get('banner/{id}/deleteMsg','BannerController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('galeria','InmuebleController', ['only' => ['create', 'store', 'index', 'edit']]);
  Route::post('galeria/{id}/update','GaleriaController@update');
  Route::get('galeria/{id}/delete','GaleriaController@destroy');
  Route::get('galeria/{id}/deleteMsg','GaleriaController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
  Route::resource('imagen','imaController', ['only' => ['store', 'index', 'edit']]);
  Route::post('imagen/cargarGale', 'ImagenController@cargarGaleria');
  Route::get('imagen/create/{id}', 'ImagenController@create');
  Route::post('imagen/{id}/update','ImagenController@update');
  Route::get('imagen/{id}/delete','ImagenController@destroy');
  Route::get('imagen/{id}/deleteMsg','ImagenController@DeleteMsg');
});

Route::get('/inmueble/data','WelcomeController@showPaginacion');

Route::post('enviar_correo', 'WelcomeController@enviarCorreo');

Route::get('/ajax_categoria/{id}', 'WelcomeController@ajaxCategoria');

Route::get('/ajaxDetalle/{id}', 'WelcomeController@ajaxDetalle');

Route::get('categoria/{id}', 'cateController@show');

Route::get('banner/{id}', 'BannerController@show');

Route::get('inmueble/{id}', 'InmuebleController@show');

Route::get('/home', 'HomeController@index')->name('home');
