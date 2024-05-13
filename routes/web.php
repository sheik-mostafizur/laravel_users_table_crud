<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::view('/users', 'users');
Route::view('/users/add', 'add_user');
