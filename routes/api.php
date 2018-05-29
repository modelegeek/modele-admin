<?php

Route::post('login', 'Controllers\Auth\LoginController@login')->name('user.login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Controllers\Auth\LoginController@logout')->name('user.logout');

    Route::resource('user', 'UserController');
});
