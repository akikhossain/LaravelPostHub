<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontHomeController;
use Illuminate\Support\Facades\Route;

// frontend routes
Route::get('/', [FrontHomeController::class, 'home'])->name('home');
Route::get('/register', [AuthController::class, 'register'])->name('account.register');


// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/login', [AuthController::class, 'login'])->name('account.login');
//     Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate');
//     Route::get('/register', [AuthController::class, 'register'])->name('account.register');
//     Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');
// });

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');
//     Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');
// });


// Route::get('/login', [AuthController::class, 'login'])->name('account.login');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate');
// Route::get('/register', [AuthController::class, 'register'])->name('account.register');
// Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');



// Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');
// Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('account.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('account.register');
    Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');
});
