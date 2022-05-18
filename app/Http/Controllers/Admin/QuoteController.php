<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller
{
	public function index(Quote $quote): View
	{
		return view('admin.all-quotes', [
			'quotes' => $quote::with('movie')->paginate(9)->withQueryString(),
		]);
	}

	public function show(Quote $quote): View
	{
		$movies = Movie::all();
		return view('admin.add-quote', [
			'movies' => $movies,
		]);
	}

	public function store(StoreQuoteRequest $request): RedirectResponse
	{
		$data = [
			'title'  => [
				'en' => $request->titleEn,
				'ka' => $request->titleEn,
			],
			'movie_id'    => $request->movie_id,
		];
		$thumbnailPath = $request->file('thumbnail')->store('thumbnails');
		$correctThumbnailPath = str_replace('thumbnails/', '', $thumbnailPath);
		$data['thumbnail'] = $correctThumbnailPath;

		Quote::create($data);

		return back()->with('success', __('ui.quote_has_been_added'));
	}

	public function edit(Quote $quote): View
	{
		$movies = Movie::all();
		return view('admin.edit-quote', [
			'quote'        => $quote,
			'quoteTitleEn' => $quote->getTranslation('title', 'en'),
			'quoteTitleKa' => $quote->getTranslation('title', 'ka'),
			'movies'       => $movies,
		]);
	}

	public function update(Quote $quote, UpdateQuoteRequest $request): RedirectResponse
	{
		$data = [
			'title'  => [
				'en' => $request->titleEn,
				'ka' => $request->titleEn,
			],
			'movie_id'    => $request->movie_id,
		];
		if ($request->thumbnail !== null)
		{
			$thumbnailPath = $request->file('thumbnail')->store('thumbnails');
			$correctThumbnailPath = str_replace('thumbnails/', '', $thumbnailPath);
			$data['thumbnail'] = $correctThumbnailPath;
		}
		$quote->update($data);

		return redirect('admin/quotes')->with('success', __('ui.quote_has_been_updated'));
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();

		return back()->with('success', __('ui.quote_has_been_deleted'));
	}
}
