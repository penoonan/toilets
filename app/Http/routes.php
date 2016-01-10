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

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('/about', ['as' => 'home.about', 'uses' => 'HomeController@about']);

Route::resource('business', 'BusinessController', ['only' => ['index', 'show', 'create', 'store']]);
Route::resource('business.message', 'BusinessMessageController', ['only' => ['create', 'store']]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {
    Route::resource('user', 'Admin\UserController', ['only' => ['index', 'show', 'edit', 'store']]);
});

Route::get('/me', ['as' => 'user.show', 'uses' => 'UserController@show']);

// Authentication routes...
Route::get('auth/login', ['as' => 'auth.getLogin', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');