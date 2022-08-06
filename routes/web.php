<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/categories', CategoryController::class)->except(['create','show','edit']);
Route::post('/categories/search', 'CategoryController@search')->name('categories.search');
Route::post('/categories/load-form', 'CategoryController@loadForm')->name('categories.loadForm');

