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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/details', 'OrderController@details')->name('home');
Route::get('/signin', 'OrderController@signin')->name('signin');
Route::post('/check_amount', 'OrderController@checkAmount')->name('check_amount');

Route::group(['middleware' => ['auth','userRole']], function () {
    Route::get('/userHome', 'UserController@userHome')->name('userHome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');