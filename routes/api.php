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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/user/index', 'UserController@index')->name('user.index');
    Route::get('/user/edit/{user}', 'UserController@edit')->name('user.edit');
    Route::post('/user/create', 'UserController@store')->name('user.store');
    Route::patch('/user/edit/{user}', 'UserController@update')->name('user.update');
    Route::delete('/user/destroy/{user}', 'UserController@destroy')->name('user.destroy');
});