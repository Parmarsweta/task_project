<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminLoginController;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/customer/register', [AuthController::class, 'showCustomerForm'])->name('customer.register');
Route::post('/customer/register', [AuthController::class, 'registerCustomer'])->name('customer.register.submit');

Route::get('/admin/register', [AuthController::class, 'showAdminForm'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'registerAdmin'])->name('admin.register.submit');

Route::get('/verify', [VerificationController::class, 'showVerifyPage'])->name('verify.page');
Route::post('/verify', [VerificationController::class, 'verifyCode'])->name('verify.code');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [App\Http\Controllers\AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');

