<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController@index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController@index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController@index')->name('admin.categories.index');
        Route::get('/create', 'CreateController@index')->name('admin.categories.create');
        Route::post('/', 'StoreController@index')->name('admin.categories.store');
        Route::get('/{category}', 'ShowController@index')->name('admin.categories.show');
    });
});

Auth::routes();
