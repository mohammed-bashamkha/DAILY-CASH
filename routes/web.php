<?php

use App\Http\Controllers\CashBoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\RevenuesExpensesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JourbalEntryController;
use App\Http\Controllers\StatementsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
});

// Authentication Routes
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // My Account Routes
    Route::get('/my-account', [UserController::class, 'showMyAccount'])->name('account.show');
    Route::get('/my-account/edit', [UserController::class, 'editMyAccount'])->name('account.edit');
    Route::put('/my-account/update', [UserController::class, 'updateMyAccount'])->name('account.update');

    // Statements Routes
    Route::get('/statements', [StatementsController::class, 'index'])->name('Statements.index');
    // select Entity for Statement
    Route::get('/statements/entities', [StatementsController::class, 'selectEntity'])
    ->name('statements.entities.form');
    // generate Entity Statement PDF
    Route::get('/statements/entity/{id}', [StatementsController::class, 'getEntityStatement'])
    ->name('statements.entities.generate');

    // select Entity for Journal Entry Statement
    Route::get('/statements/journal', [StatementsController::class, 'selectEntityForJournal'])
    ->name('journal.statement.form');
    Route::get('/statements/journal/{id}', [StatementsController::class, 'getJourbalEntryStatement'])
    ->name('journal.statement.generate');


    // Revenues Routes
    Route::get('revenues', [RevenuesExpensesController::class, 'indexRevenues'])->name('revenues.index');
    Route::get('revenues/create', [RevenuesExpensesController::class, 'createRevenue'])->name('revenues.create');
    Route::post('revenues', [RevenuesExpensesController::class, 'storeRevenue'])->name('revenues.store');
    Route::get('revenues/{id}/edit', [RevenuesExpensesController::class, 'editRevenue'])->name('revenues.edit');
    Route::put('revenues/{id}', [RevenuesExpensesController::class, 'updateRevenue'])->name('revenues.update');
    Route::delete('revenues/{id}', [RevenuesExpensesController::class, 'destroyRevenue'])->name('revenues.destroy');

    // Expenses Routes
    Route::get('expenses', [RevenuesExpensesController::class, 'indexExpenses'])->name('expenses.index');
    Route::get('expenses/create', [RevenuesExpensesController::class, 'createExpense'])->name('expenses.create');
    Route::post('expenses', [RevenuesExpensesController::class, 'storeExpense'])->name('expenses.store');
    Route::get('expenses/{id}/edit', [RevenuesExpensesController::class, 'editExpense'])->name('expenses.edit');
    Route::put('expenses/{id}', [RevenuesExpensesController::class, 'updateExpense'])->name('expenses.update');
    Route::delete('expenses/{id}', [RevenuesExpensesController::class, 'destroyExpense'])->name('expenses.destroy');


    // Entity Routes
    Route::resource('entities', EntityController::class)->names('entities');
    Route::get('/entity-statment/{entity_id}', [RevenuesExpensesController::class, 'getEntityStatement'])->name('entity-statement');

    // Journal Entries Routes
    Route::resource('journal-entries', JourbalEntryController::class);

    // About Route
    Route::get('/about', function () {
    return view('about');
    })->name('about');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
