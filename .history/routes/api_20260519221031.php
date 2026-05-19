<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookImportController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/test-openai-key', function () { return response()->json(['key' => substr(env('OPENAI_API_KEY'), 0, 5) . '***']); });

