<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.all-movies', [
			'movies' => Movie::all(),
		]);
	}

	public function show()
	{
		return view('admin.add-movie');
	}
}
