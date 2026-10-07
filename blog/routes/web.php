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
        Route::get('/edit/{category}', 'EditController@index')->name('admin.categories.edit');
        Route::post('/edit/{category}', 'UpdateController@index')->name('admin.categories.update');
        Route::get('/delete/{category}', 'DeleteController@index')->name('admin.categories.delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController@index')->name('admin.tags.index');
        Route::get('/create', 'CreateController@index')->name('admin.tags.create');
        Route::post('/', 'StoreController@index')->name('admin.tags.store');
        Route::get('/{tag}', 'ShowController@index')->name('admin.tags.show');
        Route::get('/edit/{tag}', 'EditController@index')->name('admin.tags.edit');
        Route::post('/edit/{tag}', 'UpdateController@index')->name('admin.tags.update');
        Route::get('/delete/{tag}', 'DeleteController@index')->name('admin.tags.delete');
    });
    
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController@index')->name('admin.posts.index');
        Route::get('/create', 'CreateController@index')->name('admin.posts.create');
        Route::post('/', 'StoreController@index')->name('admin.posts.store');
        Route::get('/{post}', 'ShowController@index')->name('admin.posts.show');
        Route::get('/edit/{post}', 'EditController@index')->name('admin.posts.edit');
        Route::post('/edit/{post}', 'UpdateController@index')->name('admin.posts.update');
        Route::get('/delete/{post}', 'DeleteController@index')->name('admin.posts.delete');
    });

});

Auth::routes();
