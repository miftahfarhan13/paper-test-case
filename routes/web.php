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

Route::get('/', 'LoginController@index');
Route::post('/getLogin', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/finance', 'FinanceController@index');
Route::post('/create-finance-account', 'FinanceController@createFinanceAccount');
Route::post('/create-finance', 'FinanceController@createFinance');
Route::delete('/delete-finance-account', 'FinanceController@deleteFinanceAccount');
Route::patch('/update-finance-account', 'FinanceController@updateFinanceAccount');


