<?php

use Illuminate\Support\Facades\Route;


Route::get('/ad/get', 'Api\AdController@get');

Route::post('/ad/create', 'Api\AdController@create');
