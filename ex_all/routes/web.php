<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::get('home', function () {
    return view('home');
});

//LaravelLocalization example
Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('lang_test', function () {
        return view('langtest');
    });

    //直接印出對應語言內容
    Route::get('lang_test2', function () {
        echo __('langtest.title');
    });

});

//Log example
Route::group(
    [
        'middleware' => [ 'log']
    ], function(){
    
        Route::get('log_test', function () {
            return view('logtest');
        });
        
});

