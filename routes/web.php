<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PesananBaruController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ShopController;

// Auth controller
Route::controller(AuthController::class)->group(function () {
    Route::get('login','index');
    Route::post('login','login')->name('login');
    Route::get('register','register');
    Route::post('register','registerStore');
    Route::get('logout','logout');
});


Route::middleware('auth')->prefix('admin')->group(function (){

    // Dashboard controller
    Route::controller(dashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
    });

    // Produk controller
    Route::controller(ProdukController::class)->group(function () {
        Route::get('/produk', 'index');
        Route::get('/produk/create', 'create');
        Route::post('/produk', 'store');
        Route::get('/produk/{produk}', 'show');
        Route::get('/produk/{produk}/edit', 'edit');
        Route::put('/produk/{produk}/edit', 'update');
        Route::delete('/produk/delete/{produk}', 'destroy');
    });
    // Pesanan controller
    Route::controller(PesananBaruController::class)->group(function () {
        Route::get('/pesanan-baru', 'index');
        Route::get('/pesanan-baru/{pesanan}', 'show');
    });
});

// Pelanggan Home controller
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/shop', 'shop');
    Route::get('/shop/{produk}', 'detail');
});

// Pelanggan Shop controller
Route::controller(ShopController::class)->group(function () {
    Route::get('/cart', 'cart');
    Route::post('/add-cart', 'addCart');
    Route::post('/cart/test', 'cartTest');
    Route::get('/checkout', 'index_checkOut');
    Route::post('/checkout', 'store_checkOut');
    Route::get('/invoce', 'index_invoce');
    Route::get('/thanks', 'index_thanks');
});






