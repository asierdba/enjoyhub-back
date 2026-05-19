<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
