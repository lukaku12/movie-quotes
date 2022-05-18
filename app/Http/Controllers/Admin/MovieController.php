<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class MovieController extends Controller
{
	public function index(): View
	{
		return view('admin.all-movies', [
			'movies' => Movie::with('quotes')->paginate(9)->withQueryString(),
		]);
	}

	public function create(): View
	{
		return view('admin.add-movie');
	}

	public function store(StoreMovieRequest $request): RedirectResponse
	{
		Movie::create([
			'slug'   => $request->slug,
			'title'  => [
				'en' => $request->titleEn,
				'ka' => $request->titleEn,
			],
		]);

		return back()->with('success', __('ui.movie_has_been_added'));
	}

	public function edit(Movie $movie): View
	{
		return view('admin.edit-movie', [
			'movie'        => $movie,
			'movieTitleEn' => $movie->getTranslation('title', 'en'),
			'movieTitleKa' => $movie->getTranslation('title', 'ka'),
		]);
	}

	public function update(StoreMovieRequest $request, Movie $movie): RedirectResponse
	{
		$movie->update([
			'slug'   => $request->slug,
			'title'  => [
				'en' => $request->titleEn,
				'ka' => $request->titleEn,
			],
		]);

		return redirect('admin/movies')->with('success', __('ui.movie_has_been_updated'));
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();

		return back()->with('success', __('ui.movie_has_been_deleted'));
	}
}
