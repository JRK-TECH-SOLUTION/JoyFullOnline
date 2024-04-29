<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\SystemLoad;

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
Route::get('/dashbaord', [AdminController::class, 'dashboard']);
Route::get('/systemuser', [AdminController::class, 'SystemUser']);
Route::post('/addUser', [AdminController::class, 'addUser']);
Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser']);
Route::get('/product', [AdminController::class, 'product']);
Route::post('/addProduct', [AdminController::class, 'addProduct']);
Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct']);
Route::get('/sms', [AdminController::class, 'smsApi']);
Route::post('/updateSMS', [AdminController::class, 'updateSMS']);
Route::get('/cdashboard',[customerController::class,'cdashboard']);

Route::get('/',[SystemLoad::class,'index']);

// Route::get('/', function () {
//     return view('administrator.dashboard');
// });
// Route::get('/product', function () {
//     return view('administrator.product');
// });
// Route::get('/systemuser', function () {
//     return view('administrator.systemuser');
// });
// Route::get('/sms', function () {
//     return view('administrator.sms');
// });
// Route::get('/customer', function () {
//     return view('administrator.customer');
// });
// Route::get('/maintenance', function () {
//     return view('administrator.maintenance');
// });
// Route::get('/order', function () {
//     return view('administrator.order');
// });
