<?php

use Illuminate\Support\Facades\Route;


Route::prefix('panel')->group(function (){
    Route::get('/', function() { return view('layouts.panel'); } )->name('panel.dashboard');
    Route::resource('categories', 'CategoryController', ['only' => ['index', 'store']]);
    Route::resource('products', 'ProductController', ['only' => ['index', 'create','store']]);
    Route::resource('attr-groups', 'AttributeGroupController', ['only' => ['index','store']]);
    Route::resource('attrs', 'AttributeController', ['only' => ['index','store']]);
});

