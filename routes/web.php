<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TaskController::class, 'list'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tasks/create', [TaskController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('tasks_create');

Route::post('/tasks', [TaskController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('tasks_store');

Route::get('/tasks/{id}', [TaskController::class, 'edit'])
    ->middleware(['auth', 'verified'])->name('tasks_edit');

Route::post('/tasks/{id}', [TaskController::class, 'update'])
    ->middleware(['auth', 'verified'])->name('tasks_update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
