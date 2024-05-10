<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontHomeController::class, 'home'])->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('account.login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('account.register');
    Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');
    Route::get('/create-post', [PostController::class, 'create'])->name('post.create');
    Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
    Route::get('/list-post', [PostController::class, 'list'])->name('post.list');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/update-post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/delete-post/{id}', [PostController::class, 'destroy'])->name('post.delete');
});
