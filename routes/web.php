<?php

use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Frontend\FrondendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrondendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail-product/{slug}', [FrondendController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}', [FrondendController::class, 'detailCategory'])->name('detail.category');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)->except('show', 'edit', 'create');
    Route::resource('/product', \App\Http\Controllers\ProductController::class)->except('show');
    Route::resource('/product.gallery', ProductGalleryController::class)->only('index', 'store', 'destroy');
    Route::put('/reset-password/{id}', [ProfileController::class, 'resetPassword'])->name('resetPassword');
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/my-transaction', MyTransactionController::class)->only('index');
    Route::get('/my-transaction/{id}/{slug}', [MyTransactionController::class, 'detailTransaction'])->name('my-transaction.detail');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/my-transaction', MyTransactionController::class)->only('index');
    Route::get('/my-transaction/{id}/{slug}', [MyTransactionController::class, 'detailTransaction'])->name('my-transaction.detail');
});

Route::middleware('auth')->group(function() {
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('/cart', [FrondendController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [App\Http\Controllers\Frontend\FrondendController::class, 'addToCart'])->name('cart.add');
    Route::delete('/delete-cart/{id}', [App\Http\Controllers\Frontend\FrondendController::class, 'deleteFromCart'])->name('cart.delete');
    Route::post('/checkout', [FrondendController::class, 'checkout'])->name('checkout');
});

// Route::Artisan Call
Route::get('/artisan-call', function(){
    Artisan::call('storage:link'); // storage link
    Artisan::call('route:clear'); // route clear
    Artisan::call('config:clear'); // config clear
    return 'success';
});