<?php


/***************    Toll free number routes  **********************************/
Route::get('toll/buy', 'Tollfree\BuytollController@index');


Route::get('toll/reg', 'Tollfree\RegistertollController@index');
Route::post('toll/reg', 'Tollfree\RegistertollController@store');






