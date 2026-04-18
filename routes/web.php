<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('todo');
});
use App\Http\Controllers\Api\TodoController;

Route::prefix('api')->group(function () {
    Route::get('/todos', [TodoController::class, 'index']);
    Route::post('/todos', [TodoController::class, 'store']);
    Route::put('/todos/{id}', [TodoController::class, 'update']);
    Route::delete('/todos/{id}', [TodoController::class, 'destroy']);
});