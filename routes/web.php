<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\KitchenStaff;
use App\Http\Controllers\SystemLoad;
use App\Http\Controllers\RiderController;
use App\Http\Middleware\CheckRole;

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

Route::get('/',[SystemLoad::class,'index'])->name('welcome');
Route::get('/login',[SystemLoad::class,'login'])->name('login');
Route::post('/applylogin',[SystemLoad::class,'applylogin']);
Route::get('/createaccount',[SystemLoad::class,'createaccount'])->name('createaccount');
Route::post('/create',[SystemLoad::class,'accountcreation']);
route::post('/accountcreation',[SystemLoad::class,'accountcreation']);
Route::get('/verify', [SystemLoad::class, 'verify'])->name('verify');
Route::post('verifyNumber', [SystemLoad::class, 'verifyNumber'])->name('verifyNumber');
Route::get('/adminlogin',[SystemLoad::class,'adminlogin'])->name('adminlogin');
Route::post('/userapplylogin',[SystemLoad::class,'userapplylogin']);


// Route::middleware(['auth','role:Owner'])->group(function () {
    Route::get('/dashbaord', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/systemuser', [AdminController::class, 'SystemUser']);
    Route::post('/addUser', [AdminController::class, 'addUser']);
    Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser']);
    Route::get('/product', [AdminController::class, 'product']);
    Route::post('/addProduct', [AdminController::class, 'addProduct']);
    Route::get('/deleteProduct/{id}',[AdminController::class,'deleteProduct']);
    Route::get('/sms', [AdminController::class, 'smsApi']);
    Route::post('/updateSMS', [AdminController::class, 'updateSMS']);
    Route::get('/orderbycustomer',[AdminController::class,'order']);
    Route::get('/customer', [AdminController::class, 'customer']);
    Route::get('/maintenance', [AdminController::class, 'maintenance']);
    Route::get('/delivery', [AdminController::class, 'delivery']);
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/changePassword',[AdminController::class,'changePassword']);
    Route::post('/updateProfile',[AdminController::class,'updateProfile']);
    Route::post('/updateimage',[AdminController::class,'updateimage']);
    
// });






// Route::middleware(['auth', 'role:Kitchen'])->group(function () {
    Route::get('/kdashboard',[KitchenStaff::class,'dashboard'])->name('kdashboard');
    Route::get('/korderbycustomer',[KitchenStaff::class,'order']);
    Route::get('vieworder/{id}',[KitchenStaff::class,'vieworder']);
    Route::get('updateorder/{id}',[KitchenStaff::class,'updateorder']);
    Route::post('/UpdateOrderK',[KitchenStaff::class,'UpdateOrderK']);
    Route::get('/kprofile',[KitchenStaff::class,'profile'])->name('kprofile');
    Route::post('/kchangePassword',[AdminController::class,'changePassword']);
    Route::post('/kupdateProfile',[AdminController::class,'updateProfile']);
    Route::post('/kupdateimage',[AdminController::class,'updateimage']);
    
// });


// Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/cdashbaord',[customerController::class,'dashboard'])->name('cdashbaord');
    Route::get('/corderbycustomer',[customerController::class,'corderbycustomer'])->name('mycart');
    Route::post('/addtocartItem',[customerController::class,'addtocartItem']);
    Route::post('/editquantity',[customerController::class,'editquantity']);
    Route::post('checkout',[customerController::class,'checkout']);
    Route::post('checkoutgcash',[customerController::class,'checkoutgcash']);
    Route::post('/finalcheck',[customerController::class,'finalcheck']);
    Route::get('/myorder',[customerController::class,'myorder'])->name('myorder');
    Route::get('/myorderdetails/{id}',[customerController::class,'myorderdetails'])->name('myorderview');
// });
  






// Route::middleware(['auth', 'role:Rider'])->group(function () {
    Route::get('/rdashboard',[RiderController::class,'riderdashboard'])->name('rdashboard');
    Route::get('vieworderss/{id}',[RiderController::class,'vieworder']);
    Route::get('/logout',[SystemLoad::class,'logout']);
    Route::post('/UpdateOrderKS',[RiderController::class,'UpdateOrderK']);
    Route::get('/rprofile',[RiderController::class,'profile'])->name('rprofile');
    Route::post('/rchangePassword',[AdminController::class,'changePassword']);
    Route::post('/rupdateProfile',[AdminController::class,'updateProfile']);
    Route::post('/rupdateimage',[AdminController::class,'updateimage']);