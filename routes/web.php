<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PesananBaruController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ShopController;

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

// Route::get('/', function () {
//     return view('user.home');
// });



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'registerStore']);
Route::get('logout', [AuthController::class, 'logout']);


Route::middleware('auth')->prefix('admin')->group(function (){
    Route::get('/dashboard', [dashboardController::class, 'index']);

    Route::get('/produk',[ProdukController::class, 'index']);
    Route::get('/produk/create',[ProdukController::class, 'create']);
    Route::post('/produk',[ProdukController::class, 'store']);
    Route::get('/produk/{produk}',[ProdukController::class, 'show']);
    Route::get('/produk/{produk}/edit',[ProdukController::class, 'edit']);
    Route::put('/produk/{produk}/edit',[ProdukController::class, 'update']);
    Route::delete('/produk/delete/{produk}',[ProdukController::class, 'destroy']);

    Route::get('/pesanan-baru', [PesananBaruController::class, 'index']);
    Route::get('/pesanan-baru/{pesanan}', [PesananBaruController::class, 'show']);
});


Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/shop/{produk}', [HomeController::class, 'detail']);
Route::get('/cart', [ShopController::class, 'cart']);
Route::post('/add-cart', [ShopController    ::class, 'addCart']);


Route::get('/checkout', [ShopController::class, 'index_checkOut']);
Route::post('/checkout', [ShopController::class, 'store_checkOut']);
Route::get('/invoce', [ShopController::class, 'index_invoce']);

