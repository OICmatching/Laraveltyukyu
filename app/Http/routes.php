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

//サンプルにあるので追加
Route::group(['middleware' => ['web']],function(){

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    /*
    サンプルにないので必要ない
    // 認証ルート…
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // 登録ルート…
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    */

    Route::get('/tasks','TaskController@index');
    Route::post('/task','TaskController@store');
    Route::delete('/task/{task}','TaskController@destroy');

    //サンプルにあったので追加
    Route::auth();
});
