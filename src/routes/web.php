<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/cms','as'=>'cms.'], function() {
    Route::resource('pages', 'ASSoftware\Laravel\App\Http\Controllers\PageController')->except('show');
    Route::resource('data', 'ASSoftware\Laravel\App\Http\Controllers\DataController')->except(['show','edit','update']);
    Route::resource('data.rows', 'ASSoftware\Laravel\App\Http\Controllers\DataRowController')->except('show');
    Route::resource('components', 'ASSoftware\Laravel\App\Http\Controllers\ComponentController')->except('show');
    Route::resource('pages.components', 'ASSoftware\Laravel\App\Http\Controllers\PageComponentController')->only(['store','index','destroy']);
});

Route::fallback()->get('/{page}','ASSoftware\Laravel\App\Http\Controllers\PageController@show')->name('page');
