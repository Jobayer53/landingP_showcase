<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WelcomeController;

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();
//welcome
Route::get('/sd_admin/admin', [WelcomeController::class, 'welcome'])->name('welcome');
Route::post('/welcome/store', [WelcomeController::class, 'welcome_store'])->name('welcome.store');
//auth
Route::get('/sd_admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/login/check', [AdminController::class, 'login_check'])->name('admin.login_check');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//frontend
Route::post('/product/order/store',[OrderController::class,'store'])->name('order.store');
Route::get('/thank-you',[OrderController::class,'thankyou'])->name('thankyou');


Route::middleware(['auth'])->group(function () {
    // Admin
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile/update', [AdminController::class, 'profile_update'])->name('admin.profile_update');
    //settings
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('setting.update');
    //orders
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

});
