<?php

use Illuminate\Support\Facades\Route;


Route::prefix('panel')->group(function (){
    Route::get('/', function() { return view('layouts.panel'); } )->name('panel.dashboard');
    Route::resource('categories', 'CategoryController', ['only' => ['index', 'store']]);
    Route::get('products', 'ProductController@index')->name('panel.products');
});

