<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// routes/api.php

use App\Http\Controllers\BookController;

Route::get('books', [BookController::class, 'index']);
Route::get('books/search', [BookController::class, 'search']);
Route::post('books/{book}/borrow', [BookController::class, 'borrow']);
Route::post('books/{book}/return', [BookController::class, 'return']);

