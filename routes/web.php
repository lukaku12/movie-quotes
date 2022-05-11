<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\LanguageController;
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

Route::group(['middleware' => 'language'], function () {
	#USER SECTION
	Route::get('/', [MovieController::class, 'index']);
	Route::get('set-language/{language}', [LanguageController::class, 'index'])->name('set-language');
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

	Route::get('admin/all-movies/{movie}/edit', [AdminMovieController::class, 'edit'])->middleware('admin');
	Route::patch('admin/all-movies/{movie}', [AdminMovieController::class, 'update'])->middleware('admin');
	//quote actions
	Route::get('/admin/all-quotes', [AdminQuoteController::class, 'index'])->middleware('admin');
	Route::get('/admin/add-quote', [AdminQuoteController::class, 'show'])->middleware('admin');
	Route::post('/admin/add-quote/create', [AdminQuoteController::class, 'create'])->middleware('admin');
	Route::delete('admin/all-quotes/{quote}', [AdminQuoteController::class, 'destroy'])->middleware('admin');

	Route::get('admin/all-quotes/{quote}/edit', [AdminQuoteController::class, 'edit'])->middleware('admin');
	Route::patch('admin/all-quotes/{quote}', [AdminQuoteController::class, 'update'])->middleware('admin');
	#END ADMIN SECTION
});
