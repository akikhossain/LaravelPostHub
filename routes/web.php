<?php

use App\Http\Controllers\Frontend\FrontHomeController;
use Illuminate\Support\Facades\Route;

// frontend routes
Route::get('/', [FrontHomeController::class, 'home'])->name('home');
