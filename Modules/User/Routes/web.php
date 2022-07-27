<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AddressController;
use Modules\User\Http\Controllers\UserController;

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


Route::name('user.')->prefix('user/')->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::get('register', [UserController::class, 'register'])->name('register');
});


// begin::Address Routes
Route::name('address.')->prefix('admin/')->group(function () {
    Route::get('address', [AddressController::class, 'index'])->name('index');
    Route::get('address/create', [AddressController::class, 'create'])->name('create');
    Route::post('address/create', [AddressController::class, 'store'])->name('store');
    Route::get('address/{id}/edit', [AddressController::class, 'edit'])->name('edit');
    Route::post('address/{id}/edit', [AddressController::class, 'update'])->name('update');
    Route::get('address/delete/{id}', [AddressController::class, 'destroy'])->name('delete');
});
// end::Address Routes
