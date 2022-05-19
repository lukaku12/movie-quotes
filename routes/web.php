<?php

use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => ['language']], function () {
	Route::get('/', [MovieController::class, 'index'])->name('movie.index');
	Route::get('/set-language/{language}', [LanguageController::class, 'setLocale'])->name('set-language');
	Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])->name('movie.show');

	Route::group(['middleware' => ['guest']], function () {
		Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
		Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
	});

	Route::group(['prefix'=>'admin', 'middleware' => ['admin']], function () {
		Route::get('/movies', [AdminMovieController::class, 'index'])->name('admin-movie.index');
		Route::get('/movies/create', [AdminMovieController::class, 'create'])->name('admin-movie.create');
		Route::post('/movies', [AdminMovieController::class, 'store'])->name('admin-movie.store');
		Route::get('/movies/{movie}/edit', [AdminMovieController::class, 'edit'])->name('admin-movie.edit');
		Route::patch('/movies/{movie}', [AdminMovieController::class, 'update'])->name('admin-movie.update');
		Route::delete('/movies/{movie}', [AdminMovieController::class, 'destroy'])->name('admin-movie.destroy');

		Route::get('/quotes', [AdminQuoteController::class, 'index'])->name('admin-quote.index');
		Route::get('/quotes/create', [AdminQuoteController::class, 'show'])->name('admin-quote.show');
		Route::post('/quotes', [AdminQuoteController::class, 'store'])->name('admin-quote.store');
		Route::get('/quotes/{quote}/edit', [AdminQuoteController::class, 'edit'])->name('admin-quote.edit');
		Route::patch('/quotes/{quote}', [AdminQuoteController::class, 'update'])->name('admin-quote.update');
		Route::delete('/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('admin-quote.destroy');
	});
});
