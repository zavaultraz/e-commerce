<?php

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategory;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\MyTransaction;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\transactionController;
use App\Http\Controllers\Admin\ProductGalleryController;

Route::get('/',[\App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/detail-product/{slug}',[\App\Http\Controllers\Frontend\FrontendController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}',[\App\Http\Controllers\Frontend\FrontendController::class, 'detailCategory'])->name('detail.category');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/cart',[\App\Http\Controllers\Frontend\FrontendController::class, 'cart'])->name('cart');
    Route::post('/addTocart/{id}',[\App\Http\Controllers\Frontend\FrontendController::class, 'addToCart'])->name('addtocart');
    Route::delete('/cart/{id}',[\App\Http\Controllers\Frontend\FrontendController::class, 'deleteCart'])->name('deletecart');
    Route::post('/checkout',[\App\Http\Controllers\Frontend\FrontendController::class, 'checkout'])->name('checkout');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('dashboard');
    Route::put('/reset-password/{id}',[\App\Http\Controllers\Admin\Dashboard::class, 'resetpassword'])->name('resetpassword');
    Route::resource('/category', AdminCategory::class)->except('create','show','edit');
    Route::resource('/product', ProductController::class)->except('create','show','edit');
    Route::resource('/product.gallery',ProductGalleryController::class)->except('create','show','edit','update');
    Route::resource('/mytransaction',MyTransaction::class)->only('index','show');
    Route::resource('/transaction',transactionController::class);
    Route::get('/transaction/{id}/{slug}',[transactionController::class, 'showTransactionUserByAdminWithSlugAndId'])->name('transaction.showTransactionUserByAdminWithSlugAndId');
    Route::get('/my-transaction/{id}/{slug}', [MyTransaction::class, 'showDataBySlugAndId'])->name('my-transaction.showDataBySlugAndId');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\user\Dashboardcontroller::class, 'index'])->name('dashboard');
    Route::resource('/my-transaction',MyTransaction::class)->only('index', 'show');
    Route::get('/my-transaction/{id}/{slug}', [MyTransaction::class, 'showDataBySlugAndId'])->name('my-transaction.showDataBySlugAndId');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/change-password',[\App\Http\Controllers\Profile\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/update-password',[\App\Http\Controllers\Profile\ProfileController::class, 'updatePassword'])->name('profile.update-password');
});

//route artisan call
Route::get('/storage-link', function() {
    Artisan::call('storage:link');
    return 'success';
    return 'storage link succses';
});
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'config cache succses';
});
Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return 'config clear succses';
});
Route::get('/view-cache', function() {
    Artisan::call('view:cache');
    return 'view cache succses';
});
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'view clear succses';
});
Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return 'route clear succses';
});

 

