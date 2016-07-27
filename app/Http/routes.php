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




/*  default route group*/
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect','localizationRedirect', 'localize']], function() {
    include('routes/front.routes.php');  //default route
});

/*tollfree route group*/
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'auth','localeSessionRedirect','localizationRedirect', 'localize']], function() {
     include ('routes/tollfree.routes.php');    //Toll Free number
     include ('routes/useraccount.routes.php'); //User account
});