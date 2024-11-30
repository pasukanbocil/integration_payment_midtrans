<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});

// URL pemberitahuan pembayaran - kecualikan dari CSRF
Route::post('/payment/callback', [TransactionController::class, 'callback'])->name('payment.callback');
Route::post('/transactions/update-status', [TransactionController::class, 'updatePaymentStatus'])->name('transactions.update-status');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
