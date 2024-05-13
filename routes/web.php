<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/products', function () {
    return view('index');
});


Route::get('/products/create', function () {
    return view('add_product');
})->name('product.create');
