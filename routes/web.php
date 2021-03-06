<?php

use Illuminate\Support\Facades\Route;


Route::prefix('panel')->group(function (){
    Route::get('/', function() { return view('layouts.panel'); } )
        ->name('panel.dashboard');
    Route::resource('categories', 'Panel\CategoryController',
        ['only' => ['index', 'store']]);
    Route::resource('products', 'Panel\ProductController',
        ['except' => ['create', 'destroy','show']])
        ->names('panel.products');
    Route::resource('attribute-groups', 'Panel\AttributeGroupController',
        ['only' => ['index','store']]);
    Route::resource('attributes', 'Panel\AttributeController',
        ['only' => ['index','store']]);

    Route::get('products/{product}/attributes', 'Panel\ProductAttributeController@show');
    Route::post('products/{product}/attributes', 'Panel\ProductAttributeController@store');

    Route::get('products/{product}/variations', 'Panel\ProductVariationController@show');
    Route::post('products/variations/{productAttribute}', 'Panel\ProductVariationController@store');
    Route::put('products/variations/{productAttribute}', 'Panel\ProductVariationController@update');
});

Route::resource('products', 'ProductController', ['only' => ['index','show']]);
