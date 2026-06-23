<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('books', BookController::class);
//     Route::apiResource('authors', AuthorController::class);
//     Route::apiResource('book-details', BookDetailController::class);
//     Route::apiResource('categories', CategoryController::class);
// });
Route::apiResource('books', BookController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('book-details', BookDetailController::class);
Route::apiResource('categories', CategoryController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);