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
// /month/{year}/{month}のようなurlにしたい

// SETTING
// Route::get('/setting', 'SettingController@setting');
Route::post('/setting', 'SettingController@save');
Route::get('/setting', 'SettingController@showCalendar');

// LogIn
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
