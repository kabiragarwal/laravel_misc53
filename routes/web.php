<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', 'RegistersController@create');
Route::post('register', 'RegistersController@store');

Route::get('register/confirm/{token}', 'RegistersController@confirmEmail');

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');

Route::get('logout', 'SessionsController@logout');

Route::get('dashboard', 'SessionsController@dashboard');
