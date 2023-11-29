<?php

use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\verifyMail;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\Api\AuthenticatedSessionController;

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

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login/first-step', [AuthenticatedSessionController::class, 'StepOne'])->name('login.step.one');
    Route::post('login/step-two', [AuthenticatedSessionController::class, 'StepTwo'])->name('login.step.two');
    Route::post('login/step-three', [AuthenticatedSessionController::class, 'StepThree'])->name('login.step.three');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('/verifyMail', [verifyMail::class, 'index'])->name('forget-password');
    Route::post('/checkMail', [verifyMail::class, 'checkMail'])->name('mailVerification');
    Route::get('/resetPassword', [ResetPasswordController::class, 'index'])->name("resetPassword");
    Route::put('/resetPassword', [ResetPasswordController::class, 'checkMail'])->name("updatePassword");
});
