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
    Route::resource('pages', 'PageController')->except('show');
    Route::resource('data', 'DataController')->except(['show','edit','update']);
    Route::resource('data.rows', 'DataRowController')->except('show');
    Route::resource('components', 'ComponentController')->except('show');
    Route::resource('pages.components', 'PageComponentController')->only(['store','index','destroy']);   
});

Route::get('/{page}','PageController@show')->name('page');