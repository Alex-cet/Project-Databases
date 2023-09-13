<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default Route -> Starting point of the application
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication 
Route::post('/register', function () {
    return view('register');
})->name('register');
Route::post('/processRegistration', 'App\Http\Controllers\AuthController@processRegistration')->name('processRegistration');
Route::post('/login', 'App\Http\Controllers\AuthController@loginRedirect')->name('login');
Route::get('/signOut', 'App\Http\Controllers\AuthController@signOut')->middleware('checkLogIn')->name('signOut');

// Frames
Route::get('/leftFrame', 'App\Http\Controllers\FrameController@leftFrameDisplay');
Route::get('/middleFrame', 'App\Http\Controllers\FrameController@middleFrameDisplay');

// Functionality
Route::get('/mainPage', function () {
    return view('main');
})->middleware('checkLogIn')->name('mainPage');
Route::get('/showItemsCategory/{category}', 'App\Http\Controllers\DataController@showItemsCategory');
Route::get('/productDetails/{id}', 'App\Http\Controllers\DataController@displayProductDetails');
Route::get('/addItemToCart/{id}/{price}', 'App\Http\Controllers\DataController@addItemToCart');
Route::post('/searchResult', 'App\Http\Controllers\DataController@findSearchedItems');
Route::get('/checkout', 'App\Http\Controllers\DataController@displayCheckoutItems')->middleware('checkLogIn')->name('checkout');
Route::post('/clearCart', 'App\Http\Controllers\DataController@clearCart')->name('clearCart');
Route::post('/proceedCheckout', 'App\Http\Controllers\DataController@handleCheckout')->name('proceedCheckout');
Route::get('/accountDetails', 'App\Http\Controllers\DataController@showAccountDetails')->middleware('checkLogIn')->name('accountDetails');
Route::get('/trackOrder', function () {
    return view('trackOrder');
})->middleware('checkLogIn')->name('trackOrder');
Route::post('/searchOrder', 'App\Http\Controllers\DataController@searchOrder')->name('searchOrder');
Route::post('/confirmOrderStatus/{orderNumber}', 'App\Http\Controllers\DataController@confirmOrderStatus')->name('confirmStatus');

