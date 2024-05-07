<?php

use App\Http\Controllers\Admin\ProductGalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class)->except('show', 'edit', 'create');
    Route::resource('/product', \App\Http\Controllers\ProductController::class)->except('show');
    Route::resource('/product.gallery', ProductGalleryController::class)->except('create', 'show', 'edit');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
});