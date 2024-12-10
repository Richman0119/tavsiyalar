<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Home page displaying all recommendations - requires login
Route::get('/', [PageController::class, 'home'])->name('home');

// Routes for managing recommendations
Route::middleware('auth')->prefix('pages')->group(function () {
    Route::get('/create', [PageController::class, 'create'])->name('pages.create');       // Form to create new recommendation
    Route::post('/store', [PageController::class, 'store'])->name('pages.store');         // Store new recommendation
    Route::get('/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');        // Form to edit recommendation
    Route::put('/{id}', [PageController::class, 'update'])->name('pages.update');         // Update recommendation
    Route::delete('/{id}', [PageController::class, 'destroy'])->name('pages.destroy');    // Delete recommendation
});

// User account management with authentication
Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('account');  // Account editing
    Route::patch('/account', [ProfileController::class, 'update'])->name('account.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('account.destroy');
});

Route::group(['middleware' => ['auth', 'permission:edit own recommendation|delete own recommendation']], function () {
    Route::put('/recommendations/{recommendation}', [RecommendationController::class, 'update'])
        ->middleware('own.recommendation');
    Route::delete('/recommendations/{recommendation}', [RecommendationController::class, 'destroy'])
        ->middleware('own.recommendation');
});


// Dashboard with email verification middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Load Breeze authentication routes
require __DIR__.'/auth.php';
