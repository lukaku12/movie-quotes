<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\AdminQuoteController;
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

//index page
Route::get('/', [MovieController::class, 'index']);
Route::get('/movies/{movie:slug}', [MovieController::class, 'show']);
#ADMIN SECTION
//login
Route::get('/admin/login', [AdminSessionController::class, 'index'])->middleware('guest');
Route::post('/admin/sessions', [AdminSessionController::class, 'store'])->middleware('guest');
//movie actions
Route::get('/admin/all-movies', [AdminMovieController::class, 'index'])->middleware('admin');
Route::get('/admin/add-movie', [AdminMovieController::class, 'show'])->middleware('admin');
Route::post('/admin/add-movie/create', [AdminMovieController::class, 'create'])->middleware('admin');
Route::delete('admin/all-movies/{movie}', [AdminMovieController::class, 'destroy'])->middleware('admin');
//quote actions
Route::get('/admin/all-quotes', [AdminQuoteController::class, 'index'])->middleware('admin');
Route::get('/admin/add-quote', [AdminQuoteController::class, 'show'])->middleware('admin');
Route::post('/admin/add-quote/create', [AdminQuoteController::class, 'create'])->middleware('admin');
Route::delete('admin/all-quotes/{quote}', [AdminMovieController::class, 'destroy'])->middleware('admin');
#END ADMIN SECTION
