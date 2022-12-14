<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/search', [App\Http\Controllers\WelcomeController::class, 'search']);

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'show']);

    Route::get('/work/create', [App\Http\Controllers\WorkController::class, 'create']);
    Route::post('/work/create', [App\Http\Controllers\WorkController::class, 'store']);
    Route::get('/work/{work}', [App\Http\Controllers\WorkController::class, 'show']);
    Route::get('/work/{work}/edit', [App\Http\Controllers\WorkController::class, 'edit']);
    Route::patch('/work/{work}/edit', [App\Http\Controllers\WorkController::class, 'update']);
    Route::post('/work/{work}/delete', [App\Http\Controllers\WorkController::class, 'delete']);

    Route::get('/user/{user}', [App\Http\Controllers\UserController::class, 'show']);

    Route::get('/edit-profile', [App\Http\Controllers\UserController::class, 'edit']);
    Route::patch('/edit-profile', [App\Http\Controllers\UserController::class, 'update']);

    Route::post('/work/{work}/comment/create', [App\Http\Controllers\CommentController::class, 'store']);
    Route::post('/work/{work}/comment/{comment}/create', [App\Http\Controllers\CommentController::class, 'store']);

    Route::post('/work/{work}/review/create', [App\Http\Controllers\CommentController::class, 'store']);

    Route::get('/admin/experts', [App\Http\Controllers\ExpertController::class, 'index']);
    Route::get('/admin/expert/create', [App\Http\Controllers\ExpertController::class, 'create']);
    Route::post('/admin/expert/create', [App\Http\Controllers\ExpertController::class, 'store']);
    Route::get('/admin/expert/{expert}/edit', [App\Http\Controllers\ExpertController::class, 'edit']);
    Route::patch('/admin/expert/{expert}/edit', [App\Http\Controllers\ExpertController::class, 'update']);
    Route::post('/admin/expert/{expert}/delete', [App\Http\Controllers\ExpertController::class, 'delete']);

    Route::get('/work/{work}/review/create', [App\Http\Controllers\ReviewController::class, 'create']);
    Route::post('/work/{work}/review/create', [App\Http\Controllers\ReviewController::class, 'store']);
    Route::get('/review/{review}/edit', [App\Http\Controllers\ReviewController::class, 'edit']);
    Route::patch('/review/{review}/edit', [App\Http\Controllers\ReviewController::class, 'update']);
    Route::post('/review/{review}/delete', [App\Http\Controllers\ReviewController::class, 'delete']);
});
