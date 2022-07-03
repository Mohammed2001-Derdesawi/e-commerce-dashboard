<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Order\Api\OrderApiController;

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

// Route::middleware('auth:api')->get('/order', function (Request $request) {
//     return $request->user();
// });


Route::prefix('/admin/orders')->group(function (){
    Route::get('/',[OrderApiController::class,'getOrders']);

});
