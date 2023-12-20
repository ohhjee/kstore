<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AddressController;




Route::get('checkout', [OrderController::class, 'index']);
// Route::get('address', [AddressController::class, 'show'])->name('checkout.address');

Route::post('checkouts', [AddressController::class, 'index'])->name('checkouts');
Route::get('checkouts', [AddressController::class, 'show']);
