<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
	public function index(Movie $movie)
	{
		$randomMovie = $movie::all()->random();
		$chosenMovieQuote = $randomMovie->quotes;

		if (empty($chosenMovieQuote->all()))
		{
			return redirect('/');
		}

		return view('index', [
			'movie' => $randomMovie,
			'quote' => $chosenMovieQuote,
		]);
	}

	public function show(Movie $movie)
	{
		return view('components.movie-quotes', [
			'movie'  => $movie,
		]);
	}
}
