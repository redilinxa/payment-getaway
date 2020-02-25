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
Route::put('/customers/{id}', 'CustomerController@update');//not used, in case of customer CRUD

/*Transactions api routes*/
Route::post('/account/{accountId}/updatePayment', 'AccountController@updatePayment');

