<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;

// -------------------------------------------------------
// Partie publique
// -------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/a-propos', function () {
    return view('apropos');
});

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

// -------------------------------------------------------
// Partie privée (authentifiée)
// -------------------------------------------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Tâches
    Route::resource('tasks', TaskController::class);

    // Changer le statut d'une tâche
    Route::patch('/tasks/{task}/statut', [TaskController::class, 'changerStatut'])->name('tasks.statut');

    // Catégories
    Route::resource('categories', CategoryController::class);
});