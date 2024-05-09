<?php

use App\Http\Controllers\Admin\MyTransaction;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\transactionController;
use App\Http\Controllers\AdminCategory;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::put('/reset-password/{id}',[\App\Http\Controllers\Admin\Dashboard::class, 'resetpassword'])->name('resetpassword');
    Route::resource('/category', AdminCategory::class)->except('create','show','edit');
    Route::resource('/product', ProductController::class)->except('create','show','edit');
    Route::resource('/product.gallery',ProductGalleryController::class)->except('create','show','edit','update');
    Route::resource('/mytransaction',MyTransaction::class)->only('index','show');
    Route::resource('/transaction',transactionController::class);
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\user\Dashboardcontroller::class, 'index'])->name('dashboard');
    Route::resource('/transaction',MyTransaction::class)->only('index', 'show');
});

Route::middleware('auth')->group(function () {
    Route::get('/change-password',[\App\Http\Controllers\Profile\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/update-password',[\App\Http\Controllers\Profile\ProfileController::class, 'updatePassword'])->name('profile.update-password');
});


