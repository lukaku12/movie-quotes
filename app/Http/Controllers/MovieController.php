<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;

class MovieController extends Controller
{
	public function index(): View
	{
		$quote = Quote::with('movie')->get()->random();

		return view('index', [
			'quote' => $quote,
		]);
	}

	public function show(Movie $movie): View
	{
		return view('components.movie-quotes', [
			'movie'  => $movie,
		]);
	}
}
