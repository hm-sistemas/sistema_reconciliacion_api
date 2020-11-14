<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('deposits', 'DepositController');
    Route::apiResource('incomes', 'IncomeController');
    Route::apiResource('invoices', 'InvoiceController');
    Route::apiResource('splits', 'SplitController');
});