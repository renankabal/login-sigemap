<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

// Registration
Route::get('signup', ['as'=>'signup', 'uses'=>'AuthController@getSignup']);
Route::post('signup', ['as'=>'signup', 'uses'=>'AuthController@postSignup']);
// Authentication
Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');

// Secure Routes
Route::group(['before'=>'auth'], function() {
    Route::get('secret', 'HomeController@showSecret');
});
