<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::POST('/register', 'Auth\RegisterController@register');
Route::POST('/login', 'Auth\LoginController@login');


Route::group(['middleware' => 'auth:api'], function(){

    Route::post('details', 'UserController@details');

});