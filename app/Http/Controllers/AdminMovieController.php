<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.all-movies', [
			'movies' => Movie::with('quotes')->paginate(9)->withQueryString(),
		]);
	}

	public function show()
	{
		return view('admin.add-movie');
	}

	public function create()
	{
		$data = $this->ValidateMovie();

		Movie::create($data);

		return back()->with('success', __('ui.Movie Has Been Added!'));
	}

	public function edit(Movie $movie)
	{
		return view('admin.edit-movie', [
			'movie'        => $movie,
			'movieTitleEn' => $movie->getTranslation('title', 'en'),
			'movieTitleKa' => $movie->getTranslation('title', 'ka'),
		]);
	}

	public function update(Movie $movie)
	{
		$data = $this->ValidateMovie();

		$movie->update($data);

		return redirect('admin/all-movies')->with('success', __('ui.Movie Has Been Updated!'));
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return back()->with('success', __('ui.Movie Has Been Deleted!'));
	}

	protected function ValidateMovie(): array
	{
		$attributes = request()->validate([
			'titleEn' => 'required|min:3|max:200|unique:movies,title',
			'titleKa' => 'required|min:3|max:200|unique:movies,title',
			'slug'    => 'required|min:3|max:200|unique:movies,slug',
		]);
		extract($attributes);

		return $data = [
			'title' => ['en' => $titleEn, 'ka' => $titleKa],
			'slug'  => $slug,
		];
	}
}
