<?php


/***************    Site routes  **********************************/
Route::get('/', 'Frontend\HomeController@index');

# Authentication

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');






