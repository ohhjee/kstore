<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\UserProfile;
use App\Http\Controllers\Auth\Api\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Api\Auth\ProductController;
use App\Http\Controllers\Api\cartController;
use App\Http\Controllers\Auth\Api\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Api\DashboardController as ApiDashboardController;
use App\Models\Category;

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


Route::prefix('admin')->name('admin.')->group(function () {
    require __DIR__ . '/admin-auth.php';
    Route::middleware("auth:admin")->group(function () {
        Route::resource('/', AdminDashboardController::class, [
            'names' => [
                'index' => 'dashboard'
            ]
        ]);
        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('product');
            Route::get('categories', [AdminProductController::class, 'getCate']);
            Route::post('brand', [AdminProductController::class, 'getBrand']);

            Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
            Route::get('/{slug}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
            Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
            Route::put('/{slug}', [AdminProductController::class, 'update'])->name('product.update');
            Route::delete('/{slug}', [AdminProductController::class, 'destroy'])->name('product.destroy');
        });
        Route::get('logout', [AdminDashboardController::class, 'destroy'])->name('logouts');
    });
});


Route::get("test", function () {
    return Inertia::render("Test");
});
Route::get("about", function () {
    return Inertia::render("about");
});
Route::group(['prefix' => ''], function () {
    Route::get('', [DashboardController::class, 'index']);
});
Route::get('/product/{slug}', [ProductController::class, 'index']);
Route::post('/cart/{product:id}', [cartController::class, 'add'])->name('cart');
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get("profile", [UserProfile::class, 'create']);
    Route::put("profile", [UserProfile::class, 'update'])->name('profile.update');
});
require __DIR__ . '/auth.php';
