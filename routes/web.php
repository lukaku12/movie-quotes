<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'index']);
Route::get('/movies/{movie:slug}', [MovieController::class, 'show']);

Route::get('/admin/login', [AdminMovieController::class, 'index']);
Route::get('/admin/dashboard', [AdminMovieController::class, 'show']);

// TODO LANGUAGE
