<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AuthenticationAdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::any('/', function () {
    if (config('app.env') === "production") {
        return redirect()->away(config('app.frontend_url'));
    }
    return response("How did you get here? 🤨 <br/> Please talk to an admin");
});
Route::middleware('guest:admin')->group(function () {
    Route::get("login", [AuthenticationAdminController::class, 'index'])->name("login");
    Route::post("login", [AuthenticationAdminController::class, 'store']);
});
