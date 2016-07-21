<?php


/***************    Site routes  **********************************/
Route::get('/', 'Frontend\HomeController@index');




# Authentication
Route::get('/auth/login', ['as' => 'login', 'middleware' => ['guest'], 'uses' => 'Auth\SessionsController@create']);
Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\SessionsController@destroy']);
Route::any('/auth/store', ['as' => 'auth.store', 'uses' => 'Auth\SessionsController@store']);
Route::any('/auth/create', ['as' => 'auth.create', 'uses' => 'Auth\SessionsController@create']);
Route::any('/auth/destroy', ['as' => 'auth.destroy', 'uses' => 'Auth\SessionsController@destroy']);


