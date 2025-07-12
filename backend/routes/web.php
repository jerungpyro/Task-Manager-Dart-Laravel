<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebTaskController;

Route::get('/', [WebTaskController::class, 'index'])->name('home');

// Task management routes
Route::resource('tasks', WebTaskController::class);
Route::patch('tasks/{task}/toggle', [WebTaskController::class, 'toggle'])->name('tasks.toggle');
