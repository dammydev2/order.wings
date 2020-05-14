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

Route::get('/details', 'OrderController@details')->name('details');
Route::get('/signin', 'OrderController@signin')->name('signin');
Route::post('/check_amount', 'OrderController@checkAmount')->name('check_amount');

Route::group(['middleware' => ['verified','userRole']], function () {
    Route::get('/userHome', 'UserController@userHome')->name('userHome');
    Route::get('/orderHistory', 'UserController@orderHistory')->name('orderHistory');
    Route::get('/userTransactionHistory', 'UserController@userTransactionHistory')->name('userTransactionHistory');
    Route::get('/addOrderDetails', 'UserController@addOrderDetails');
    Route::get('/makePayment', 'UserController@makePayment')->name('makePayment');
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    Route::post('/enterDetails', 'UserController@enterDetails')->name('enterDetails'); 
});

Route::group(['middleware' => ['verified','AdminRole']], function () {
    Route::get('/customerList', 'HomeController@customerList')->name('customerList');
    Route::get('/totalTransaction', 'HomeController@totalTransaction')->name('totalTransaction');
    Route::get('/dateTransaction', 'HomeController@dateTransaction')->name('dateTransaction');
    Route::get('/allOrder', 'HomeController@allOrder')->name('allOrder');
    Route::get('/pendingOrder', 'HomeController@pendingOrder')->name('pendingOrder');
    Route::get('/enrouteOrder', 'HomeController@enrouteOrder')->name('enrouteOrder');
    Route::get('/deliveredOrder', 'HomeController@deliveredOrder')->name('deliveredOrder');
    Route::get('/addRider', 'HomeController@addRider')->name('addRider');
    Route::post('/getDateTransaction', 'HomeController@getDateTransaction')->name('getDateTransaction');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');