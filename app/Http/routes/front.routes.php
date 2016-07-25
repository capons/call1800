<?php


/***************    Site routes  **********************************/
Route::get('/', 'Frontend\HomeController@index'); //front page route
Route::get('/success','Frontend\SuccessController@index'); //success route

# Authentication

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

#Registration

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister'); //view auth/register
Route::post('auth/register', 'Auth\AuthController@postRegister'); //receive data from registration form
Route::get('auth/active', 'Auth\AuthController@postActivate'); //activate user account






