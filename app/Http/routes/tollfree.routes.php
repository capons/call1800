<?php


/***************    Toll free number routes  **********************************/
Route::get('toll/buy', 'Tollfree\BuytollController@index');          //buy toll free number
Route::post('toll/buy', 'Tollfree\BuytollController@store');

Route::get('toll/confirm','TollFree\ConfirmController@index');     //confirm payment
Route::post('toll/confirm','TollFree\ConfirmController@store');

Route::get('toll/reg', 'Tollfree\RegistertollController@index');     //registr toll free number
Route::post('toll/reg', 'Tollfree\RegistertollController@store');






