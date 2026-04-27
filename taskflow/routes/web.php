<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('tasks', TaskController::class);
    // (Tu pourras ajouter la ressource categories plus tard)
});

Route::get('/', function () {
    return view('home');
});

Route::get('/propos', function () {
    return view('propos');
});
Route::get('/login', function () {
    return view('login');
})->name('login');