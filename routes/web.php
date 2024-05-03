<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminCategory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::resource('/category', AdminCategory::class)->except('create','show','edit');
    Route::resource('/product', ProductController::class)->except('create','show','edit');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\user\Dashboardcontroller::class, 'index'])->name('dashboard');
});
