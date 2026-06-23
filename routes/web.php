<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/ui/books', [BookController::class, 'uiIndex'])->name('books.ui');

Route::get('/ui/books/create', [BookController::class, 'create'])->name('books.create'); 
Route::post('/ui/books', [BookController::class, 'store'])->name('books.store');
Route::get('/ui/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); 
Route::put('/ui/books/{id}', [BookController::class, 'update'])->name('books.update'); 
Route::delete('/ui/books/{id}', [BookController::class, 'destroy'])->name('books.destroy'); 

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// សម្រាប់អ្នកទើបចូលមកដល់ (Login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// សម្រាប់អ្នកដែល Login រួច (Dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    // Route សម្រាប់ CRUD សៀវភៅផ្សេងៗទៀតដាក់នៅទីនេះ
});