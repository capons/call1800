<?php


/***************    Toll free number routes  **********************************/
Route::get('toll/buy', 'Tollfree\BuytollController@index');          //buy toll free number
Route::post('toll/buy', 'Tollfree\BuytollController@store');

Route::get('toll/confirm','TollFree\ConfirmController@index');     //confirm payment
//Route::post('toll/confirm','TollFree\ConfirmController@store');
/*******  PayPal routes*/
Route::post('paycheck','Payment\PaypalController@getCheckout');                //pay via PayPal
Route::get('getdone/{id}', 'Payment\PaypalController@getDone');
Route::get('getcancel', 'Payment\PaypalController@getCancel');
/******* ./PayPal routes*/

/*** Strip routes****/
//Route::get('spaycheck',['as' => 'spaycheck','Payment\StripeController@index']);                //pay via Stripe
Route::post('spaycheck','Payment\StripeController@store');                //pay via Stripe
/*** ./Stripe routes***/

Route::get('toll/reg', 'Tollfree\RegistertollController@index');     //registr toll free number
Route::post('toll/reg', 'Tollfree\RegistertollController@store');






