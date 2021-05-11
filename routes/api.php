<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CustomersController;

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

Route::group(['prefix' => '/customers'], function(){
    Route::get('', [CustomersController::class, 'index'])->name('customers.index');
    Route::post('', [CustomersController::class, 'store'])->name('customers.store');
    Route::get('/{id}', [CustomersController::class, 'show'])->name('customers.show');
    Route::put('/{id}', [CustomersController::class, 'update'])->name('customers.update');
    Route::delete('/{id}', [CustomersController::class, 'destroy'])->name('customers.destroy');
});

// Route::group(['prefix' => '/accounts'], function(){
//     Route::get('', [AccountsController::class, 'index'])->name('account.index');
//     Route::post('', [AccountsController::class, 'store'])->name('account.store');
//     Route::get('/{id}', [AccountsController::class, 'show'])->name('account.show');
//     Route::put('/{id}', [AccountController::class, 'update'])->name('account.update');
//     Route::delete('/{id}', [AccountController::class, 'destroy'])->name('account.destroy');
//     // Route::post('/deposit', [AccountController::class, 'deposit'])->name('account.deposit');
//     // Route::post('/withdraw', [AccountController::class, 'withdraw'])->name('account.withdraw');
// });
