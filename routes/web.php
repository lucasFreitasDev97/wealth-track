<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/transactions', [\App\Models\Transaction::class, 'index'])->name('transactions.index');
    Route::get('/transactions/form/{transaction?}', [\App\Models\Transaction::class, 'form'])->name('transactions.form');
    Route::post('/transactions/store', [\App\Models\Transaction::class, 'store'])->name('transactions.store');
    Route::patch('/transactions/update/{transaction}', [\App\Models\Transaction::class, 'update'])->name('transactions.update');
    Route::get('/transactions/destroy/{transaction}', [\App\Models\Transaction::class, 'destroy'])->name('transactions.destroy');
});

require __DIR__.'/auth.php';
