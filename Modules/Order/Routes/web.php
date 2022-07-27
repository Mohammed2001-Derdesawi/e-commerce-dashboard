<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Order\OrderController;
use Modules\Order\Http\Controllers\Payment\PaymentController;

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



Route::prefix('/admin/orders')->middleware('admin')->name('admin.orders.')->group(function() {
    Route::get('/', [OrderController::class,'index'])->name('index');
    Route::get('/show/{id}',[OrderController::class,'show'])->name('show');
});

Route::prefix('/orders')->middleware('web')->name('shipment.')->group(function() {
Route::get('/rates',[OrderController::class,'getrates']);
// Route::get('/create',[OrderController::class,'store'])->name('orders.create');
Route::get('/payment',[PaymentController::class,'payment'])->name('payment');
Route::post('/payment/cancel',[PaymentController::class,'cancel'])->name('payment.cancel');
Route::get('/payment/success/',[PaymentController::class,'success'])->name('payment.success');

});