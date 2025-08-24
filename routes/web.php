<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')->middleware('auth')->name('dashboard');

// Registration Routes
Route::view('register', 'auth.register')->name('register');
Route::post('register', RegisterController::class)->name('register.store');

// Login Routes
Route::view('login', 'auth.login')->name('login');
