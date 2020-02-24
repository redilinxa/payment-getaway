<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Customer api routes*/
Route::get('/customers', 'CustomerController@index');
Route::post('/customers', 'CustomerController@store');
Route::put('/customers/{id}', 'CustomerController@update');

/*Transactions api routes*/
Route::post('/transactions/customer/{customerId}/deposit', 'TransactionsController@deposit');
Route::post('/transactions/customer/{customerId}/withdraw', 'TransactionsController@withdraw');
Route::get('/transactions/report','TransactionsController@report');

