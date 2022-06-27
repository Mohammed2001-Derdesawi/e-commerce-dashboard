<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Authorzation\RoleController;

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

Route::prefix('admin')->group(function() {
    //Route::get('/roles', [RoleController::class,'index']);
    Route::get('/', 'AdminController@index');
});


Route::get('test' , function(){
    return view('admin::Admin.layouts.master');
});


