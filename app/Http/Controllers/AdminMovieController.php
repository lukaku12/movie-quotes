<?php

namespace App\Http\Controllers;

use App\Models\Movie;
// todo fix n+1 problem
class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.all-movies', [
			'movies' => Movie::latest()->get(),
		]);
	}

	public function show()
	{
		return view('admin.add-movie');
	}

	public function create()
	{
		$attributes = request()->validate([
			'title' => 'required|min:3|max:200|unique:movies,title',
			'slug'  => 'required|min:3|max:200|unique:movies,slug',
		]);
		Movie::create($attributes);

		return redirect()->back();
	}

	public function edit(Movie $movie)
	{
		return view('admin.edit-movie', ['movie' => $movie]);
	}

	public function update(Movie $movie)
	{
		$attributes = request()->validate([
			'title' => 'required|min:3|max:200|unique:movies,title',
			'slug'  => 'required|min:3|max:200|unique:movies,slug',
		]);

		$movie->update($attributes);

		return redirect('admin/all-movies');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return back();
	}
}
