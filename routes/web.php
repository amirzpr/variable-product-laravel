<?php

use Illuminate\Support\Facades\Route;


Route::prefix('panel')->group(function (){
    Route::get('/', function() { return view('layouts.panel'); } )->name('panel.dashboard');
    Route::resource('categories', 'Panel\Product\CategoryController', ['only' => ['index', 'store']]);
    Route::resource('products', 'Panel\Product\ProductController', ['only' => ['index', 'create','store']]);
    Route::resource('attr-groups', 'Panel\Product\AttributeGroupController', ['only' => ['index','store']]);
    Route::resource('attrs', 'Panel\Product\AttributeController', ['only' => ['index','store']]);
});

