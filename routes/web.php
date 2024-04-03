<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;


Route::resource('authors', AuthorController::class);
Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::get('/categories/{category}/toggle-status', [App\Http\Controllers\CategoryController::class, 'toggleStatus'])->name('categories.toggleStatus');
Route::post('/categories/{category}/toggle-status', [App\Http\Controllers\CategoryController::class, 'toggleStatus'])->name('categories.toggleStatus');
Route::get('/books/{book}/toggle-status', [App\Http\Controllers\BookController::class, 'toggleStatus'])->name('books.toggleStatus');
Route::post('/books/{book}/toggle-status', [App\Http\Controllers\BookController::class, 'toggleStatus'])->name('books.toggleStatus');


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');