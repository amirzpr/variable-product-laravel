<?php

use Illuminate\Support\Facades\Route;


Route::prefix('panel')->group(function (){
    Route::get('/', function() { return view('layouts.panel'); } )->name('panel.dashboard');
    Route::get('categories', 'CategoryController@index')->name('panel.categories');
    Route::get('products', 'ProductController@index')->name('panel.products');
});

