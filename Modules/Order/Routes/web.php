<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Order\OrderController;
use Modules\Order\Http\Controllers\Payment\PaymentController;
use Modules\Order\Http\Controllers\Shipment\ShipmentController;

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

//Start user Order Routes
Route::prefix('/orders')->middleware('web')->name('orders.')->group(function() {
 Route::get('/track',[OrderController::class,'track'])->name('track');
Route::get('/payment',[PaymentController::class,'payment'])->name('payment');
Route::post('/payment/cancel',[PaymentController::class,'cancel'])->name('payment.cancel');
Route::any('/payment/success/',[PaymentController::class,'success'])->name('payment.success');
Route::get('/user/order/{id}',[PaymentController::class,'getUserOrder'])->name('user.order');
Route::get('/user/orders',[PaymentController::class,'getUserOrders'])->name('user.orders');


});

//End user Order Routes


Route::name('admin.')->prefix('admin/')->group(function (){
    Route::prefix('shipments/')->name('shipment.')->group(function (){
        Route::get('/methods',[ShipmentController::class,'index'])->name('methods.index');
       
        
    

    });
    Route::prefix('payments/')->name('payment.')->group(function (){
        Route::get('/methods',[PaymentController::class,'index'])->name('methods.index');


    });

});
