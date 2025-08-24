<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')->middleware('auth')->name('dashboard');

// Registration Routes
Route::view('register', 'auth.register')->middleware('guest')->name('register');
Route::post('register', RegisterController::class)->middleware('guest')->name('register.store');

// Login Routes
Route::view('login', 'auth.login')->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('login.attempt');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
