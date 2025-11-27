<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\RevenuesExpensesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JourbalEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Authentication Routes
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Entity Routes
    Route::resource('entities', EntityController::class)->names('entities');
    Route::get('/entity-statment/{entity_id}', [RevenuesExpensesController::class, 'getEntityStatement'])->name('entity-statement');
        // Journal Entries Routes
    Route::resource('journal-entries', JourbalEntryController::class);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
