<?php

use App\Http\Controllers\UserModelController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserModelController::class, 'home']);
Route::get('cart', [UserModelController::class, 'showLogin'])->name('cart');
Route::get('checkout', [UserModelController::class, 'showLogin'])->name('checkout');
Route::get('shop', [UserModelController::class, 'shop'])->name('shop');
Route::get('shop-detail', [UserModelController::class, 'shopDetails'])->name('shop-detail');
Route::get('contact', [UserModelController::class, 'contact'])->name('contact');


// ************        Admin Routes       ****************

Route::get('login', [UserModelController::class, 'showLogin'])->name('login');
Route::post('login', [UserModelController::class, 'login']);