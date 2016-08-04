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


/**********Search route************/
Route::get('/search', 'Search\SearchController@index'); //default search view
Route::post('/search', 'Search\SearchController@filter'); //display filter data


/***********Get all country data from https://restcountries.eu/ routes*******************/

Route::post('auth/country', 'Api\AllcountryController@getCountryCode');

/*********** ./get all country data***********************************/



