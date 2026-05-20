<?php
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookImportController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/books/import/random-genre', [BookImportController::class, 'importRandomByGenre']);

=======
use App\Http\Controllers\BookController;
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show']);
>>>>>>> bdbe679b18d15ce63557224e84bcdf44b4ec0901
