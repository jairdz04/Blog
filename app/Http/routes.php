<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'],function(){

//Route::post('login' , 'ApiAuthController@authenticate');
//Route::resource('login','ApiAuthController', ['only' =>['index']]);

Route::resource('alumno','alumnosController');
Route::resource('historias','historiaController');
Route::resource('registro','registroController');
Route::resource('noticia', 'noticiasController');
Route::get('alumno/all/{cantidad}', 'alumnosController@getAlumnos');
Route::post('authenticate', 'Auth\AuthController@authenticate');
Route::resource('usuario', 'UserController');



/*Route::get('login', [
      'uses' => 'Auth\AuthController@getLogin',
      'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
  'uses' => 'Auth\AuthController@getLogout',
  'as' => 'logout'
]);
Route::get('principal', [ 'middleware' => 'auth',
        'uses' => 'HomeController@principal',
        'as' => 'principal'
    ]
);*/


});
