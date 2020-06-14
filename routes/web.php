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
Route::get('/year', 'YearController@getCalendarDates');

// MONTH
Route::get('/month', 'MonthController@getCalendarDates');
Route::get('/edit/{id}', 'MonthController@edit'); //編集ページに飛ぶ
Route::post('/edit/{id}', 'MonthController@update'); //編集後、更新

// SETTING
Route::post('/setting', 'SettingController@save');
Route::get('/setting', 'SettingController@setting');

