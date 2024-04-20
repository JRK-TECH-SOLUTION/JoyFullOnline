<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('administrator.dashboard');
});
Route::get('/product', function () {
    return view('administrator.product');
});
Route::get('/systemuser', function () {
    return view('administrator.systemuser');
});
Route::get('/sms', function () {
    return view('administrator.sms');
});
Route::get('/customer', function () {
    return view('administrator.customer');
});
Route::get('/maintenance', function () {
    return view('administrator.maintenance');
});
Route::get('/order', function () {
    return view('administrator.order');
});
