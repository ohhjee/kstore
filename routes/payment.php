<?php

use App\Http\Controllers\Api\PaymentController;
use Illuminate\Support\Facades\Route;




// Route::get('/pay', [PaymentController::class, 'index'])->name('pay');
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::post('/order', [PaymentController::class, 'order'])->name('order');

Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
