<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/product/order/store',[OrderController::class,'store'])->name('order.store');
Route::get('/thank-you',[OrderController::class,'thankyou'])->name('thankyou');
