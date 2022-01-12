<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'verified', 'role:ADMIN'])->group(function () {

    Route::get("/", [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.index');

    Route::get('/users/verification', [App\Http\Controllers\UserVerificationController::class, 'index'])->name('users.verification');
    Route::post('/users/qrcode', [App\Http\Controllers\UserVerificationController::class, 'checkQRCode'])->name('users.qrcode');
    Route::post('/users/verify', [App\Http\Controllers\UserVerificationController::class, 'verify'])->name('users.verify');
});

Route::prefix('client')->middleware(['auth', 'verified', 'role:CLIENT'])->group(function () {
    Route::get("/", [App\Http\Controllers\ClientHomeController::class, 'index'])->name('client.index');;
});
