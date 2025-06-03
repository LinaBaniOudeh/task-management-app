<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::resource('tasks', TaskController::class)->except('show');
Route::get('tasks-export', [TaskController::class, 'export'])->name('tasks.export');
