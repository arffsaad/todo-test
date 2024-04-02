<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/todos', 'App\Http\Controllers\TodoController@get');
