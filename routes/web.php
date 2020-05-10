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
    return view('welcome');
});

// HOME
Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@input');

// YEAR
Route::get('/year', 'YearController@index');

// MONTH
Route::get('/month', 'MonthController@index');
// /month/{year}/{month}

// SETTING
Route::get('/setting', 'SettingController@setting');
Route::post('/setting', 'SettingController@save');