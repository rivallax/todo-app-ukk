<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');

Route::resource('lists', TaskListController::class);

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::get('/all-task', [TaskController::class, 'allTasks'])->name('all-task');

Route::get('/low', [TaskController::class, 'index'])->name('low');
Route::get('/medium', [TaskController::class, 'index'])->name('medium');
Route::get('/high', [TaskController::class, 'index'])->name('high');
