<?php

use Illuminate\Support\Facades\Route;


Auth::routes();
//home
Route::get('/', 'HomeController@index')->name('home');
//category
Route::resource('/categories', CategoryController::class)->except(['create','show','edit']);
Route::post('/categories/search', 'CategoryController@search')->name('categories.search');
Route::post('/categories/load-form', 'CategoryController@loadForm')->name('categories.loadForm');
//supplier
Route::resource('/suppliers',SupplierController::class)->except(['create','show','edit']);
Route::post('/suppliers/load-form', 'SupplierController@loadForm')->name('supplier.loadForm');
Route::post('/suppliers/search', 'SupplierController@search')->name('supplier.search');
