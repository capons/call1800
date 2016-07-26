<?php

/********** User account routes *********/
Route::get('us/account', 'Account\AccountController@index');
Route::post('us/account', 'Account\AccountController@store');