<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Order\Api\OrderApiController;
use Modules\Order\Http\Controllers\Payment\Api\PaymentApiController;
use Modules\Order\Http\Controllers\Shipment\Api\ShipmentApiController;

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


Route::prefix('/admin//')->group(function (){
    Route::prefix('orders/')->group(function (){
        Route::get('/',[OrderApiController::class,'getOrders']);
        Route::get('/rates',[OrderApiController::class,'getrates']);


    });

    Route::prefix('shipments')->group(function(){
        Route::get('/methods',[ShipmentApiController::class,'index']);
        Route::post('/method/update/{id}',[ShipmentApiController::class,'update']);
        Route::post('/method/change/status/{id}',[ShipmentApiController::class,'changestatus']);

    });
    Route::prefix('payments')->group(function(){
        Route::get('/methods',[PaymentApiController::class,'index']);
        Route::post('/method/update/{id}',[PaymentApiController::class,'update']);
        Route::post('/method/change/status/{id}',[PaymentApiController::class,'changestatus']);

    });


});
