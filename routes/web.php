<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

// Registration Routes
Route::view('register', 'auth.register')->middleware('guest')->name('register');
Route::post('register', RegisterController::class)->middleware('guest')->name('register.store');

// Login Routes
Route::view('login', 'auth.login')->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('login.attempt');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->middleware('auth')->name('dashboard');
    Route::get('/reports/monthly', ReportController::class)->name('reports.monthly');

    // Expenses
    Route::get('expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('expenses/{expense:id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('expenses/{expense:id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::get('expenses/{expense:id}', [ExpenseController::class, 'show'])->name('expenses.show');
    Route::delete('expenses/{expense:id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
});