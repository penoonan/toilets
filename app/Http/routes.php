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

Route::group(['prefix' => 'businesses'], function() {
    Route::get('/', ['as' => 'businesses.index', 'uses' => 'BusinessController@index']);
    Route::get('/{business}', ['as' => 'businesses.show', 'uses' => 'BusinessController@show']);

    // gotta be logged in to take any actions
    // gonna need this for some due-diligence throttling purposes
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/flag', ['as' => 'businesses.create', 'uses' => 'BusinessController@create']);
        Route::post('/', ['as' => 'businesses.store', 'uses' => 'BusinessController@store']);

        // TODO
        // Refactor into resourceful controllers - messages should be sub resource of businesses, as well as of users. .. hmm
        Route::get('/{business}/tell', ['as' => 'businesses.message_form', 'uses' => 'BusinessController@messageForm']);
        Route::put('/{business}', ['as' => 'businesses.send_message', 'uses' => 'BusinessController@sendMessage']);
    });

});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
