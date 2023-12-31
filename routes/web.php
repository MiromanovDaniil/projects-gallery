<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Inertia\Inertia;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('projects', ProjectController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

Route::get('/projects/create', [ProjectController::class,'create'])->name('projects.create');
Route::get('/projects/{project}/edit', [ProjectController::class,'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class,'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class,'destroy'])->name('projects.destroy');

Route::post('/projects', [ProjectController::class,'store'])->name('projects.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
