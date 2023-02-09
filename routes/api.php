<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskCategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/TaskCategories', [TaskCategoriesController::class, 'index']);
Route::get('/TaskCategories/{id}', [TaskCategoriesController::class, 'show']);
Route::post('/TaskCategories', [TaskCategoriesController::class, 'store']);
Route::put('/TaskCategories/{id}', [TaskCategoriesController::class, 'update']);
Route::delete('/TaskCategories/{id}', [TaskCategoriesController::class, 'destroy']);

Route::get('/Task', [TaskController::class, 'index']);
Route::get('/Task/{id}', [TaskController::class, 'show']);
Route::post('/Task', [TaskController::class, 'store']);
Route::put('/Task/{id}', [TaskController::class, 'update']);
Route::delete('/Task/{id}', [TaskController::class, 'destroy']);
