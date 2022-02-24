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

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
});


Route::middleware('auth')->group(function () {
    Route::view('/', 'home')->name('home');
    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::view('/deposit', 'deposit')->name('deposit');
    Route::post('/deposit', 'TransactionController@deposit');

    Route::view('/withdraw', 'withdraw')->name('withdraw');
    Route::post('/withdraw', 'TransactionController@withdraw');

    Route::view('/transfer', 'transfer')->name('transfer');
    Route::post('/transfer', 'TransactionController@transfer');

    Route::get('/statement', 'TransactionController@statement')->name('statement');
});
