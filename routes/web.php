<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;
// Route untuk halaman utama (Home), yang akan memanggil method 'index' di TaskController
Route::get('/', [TaskController::class, 'index'])->name('home');

// Resource route untuk TaskListController
// Ini akan otomatis membuat route CRUD untuk task lists (index, create, store, show, edit, update, destroy)
Route::resource('lists', TaskListController::class);

// Resource route untuk TaskController
// Sama seperti di atas, akan otomatis menangani semua operasi CRUD untuk tasks
Route::resource('tasks', TaskController::class);

// Route PATCH untuk menandai tugas sebagai selesai
// Menggunakan metode PATCH karena hanya memperbarui satu atribut (is_completed)
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

// Route untuk menampilkan semua tugas (all tasks)
// Memanggil method 'allTasks' di TaskController
Route::get('/all-task', [TaskController::class, 'allTasks'])->name('all-task');

// Route untuk menampilkan halaman profil pengguna
Route::get('/profile', [TaskController::class, 'profile'])->name('profile');

// Route untuk menampilkan daftar tugas dengan prioritas rendah (low priority)
Route::get('/low', [TaskController::class, 'low'])->name('low');

// Route untuk menampilkan daftar tugas dengan prioritas sedang (medium priority)
Route::get('/medium', [TaskController::class, 'medium'])->name('medium');

// Route untuk menampilkan daftar tugas dengan prioritas tinggi (high priority)
Route::get('/high', [TaskController::class, 'high'])->name('high');

// Route PATCH untuk mengubah daftar (list) dari sebuah tugas
// Method ini akan dipanggil ketika pengguna ingin memindahkan tugas dari satu daftar ke daftar lainnya
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])
    ->name('tasks.changeList'); // Menamai route sebagai 'tasks.changeList' untuk referensi di aplikasi
