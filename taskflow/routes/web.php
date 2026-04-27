<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Partie publique
Route::get('/', function () {
    return view('welcome');
});

Route::get('/a-propos', function () {
    return view('apropos');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard2', function () {
    return view('dashboard');
});
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);

// login (si pas Breeze)
Route::get('/login', function () {
    return view('login');
})->name('login');


// Partie privée (authentifiée)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('tasks', TaskController::class);

});