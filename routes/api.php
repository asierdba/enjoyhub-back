<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookImportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\ListItemController;
use App\Http\Controllers\DiscardedController;
use App\Http\Controllers\RecommendationController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);

Route::get('/books/by-emotion/{emotionId}', [BookController::class, 'getBooksByEmotion']);


Route::get('/emotions', function () {return \App\Models\Emotion::all();});

Route::post('/books/import/random-genre', [BookImportController::class, 'importRandomByGenre']);



Route::get('/users', [UserController::class, 'index']);
Route::patch('/users/{userId}/icon',     [UserController::class, 'updateProfileIcon']);
Route::patch('/users/{userId}/profile',  [UserController::class, 'updateProfile']);
Route::patch('/users/{userId}/password', [UserController::class, 'updatePassword']);
Route::get('/users/{id}/lists', [UserListController::class, 'getListsByUser']);

Route::post('/users/{userId}/lists', [UserListController::class, 'createList']);
Route::delete('/lists/{listId}', [UserListController::class, 'deleteList']);
Route::post('/users/{userId}/discarded/{contentId}', [DiscardedController::class, 'addToDiscarded']);
Route::get('/users/{userId}/discarded', [DiscardedController::class, 'getDiscardedByUser']);



Route::get('/lists/{listId}/items', [ListItemController::class, 'getItemsByList']);
Route::post('/lists/{listId}/items', [ListItemController::class, 'addItemToList']);
Route::delete('/lists/{listId}/items/{contentId}', [ListItemController::class, 'deleteItemFromList']);

Route::post('/recommendations', [RecommendationController::class, 'getRecommendation']);


