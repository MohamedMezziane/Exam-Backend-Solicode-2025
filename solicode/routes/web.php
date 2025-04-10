<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;

Route::get('/', function () {
    return view('welcome');
});


// All 7 Routes
// ------------

// Index Route
Route::get('/salles', [SalleController::class, 'index'])->name('salles.index');

// Create and Store Routes
Route::get('/salles/create', [SalleController::class, 'create'])->name('salles.create');
Route::post('/salles', [SalleController::class, 'store'])->name('salles.store');

// Show Details Route
Route::get('/salles/{salle}', [SalleController::class, 'show'])->name('salles.show');

// Edit and Update Routes
Route::get('/salles/{salle}/edit', [SalleController::class, 'edit'])->name('salles.edit');
Route::put('/salles/{salle}', [SalleController::class, 'update'])->name('salles.update');

// Delete Route
Route::delete('/salles/{salle}', [SalleController::class, 'destroy'])->name('salles.destroy');



