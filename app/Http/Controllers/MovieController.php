<?php

namespace App\Http\Controllers;

class MovieController extends Controller
{
	public function index()
	{
		return view('index');
	}

	public function show()
	{
		return view('components.movie-quotes');
	}
}
