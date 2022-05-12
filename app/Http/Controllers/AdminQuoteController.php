<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class AdminQuoteController extends Controller
{
	public function index(Quote $quote)
	{
		return view('admin.all-quotes', [
			'quotes' => $quote::with('movie')->paginate(9)->withQueryString(),
		]);
	}

	public function show(Quote $quote)
	{
		return view('admin.add-quote');
	}

	public function create()
	{
		$thumbnailPath = request()->file('thumbnail')->store('thumbnails');
		$correctThumbnailPath = str_replace('thumbnails/', '', $thumbnailPath);

		$attributes = request()->validate([
			'titleEn'     => 'required|min:3|max:200|unique:movies,title',
			'titleKa'     => 'required|min:3|max:200|unique:movies,title',
			'movie_id'    => 'required',
			'thumbnail'   => 'required|image',
		]);
		extract($attributes);

		Quote::create([
			'title'     => ['en' => $titleEn, 'ka' => $titleKa],
			'thumbnail' => $correctThumbnailPath,
			'movie_id'  => $movie_id,
		]);

		return back()->with('success', __('ui.Quote Has Been Added!'));
	}

	public function edit(Quote $quote)
	{
		return view('admin.edit-quote', ['quote' => $quote]);
	}

	public function update(Quote $quote)
	{
		$thumbnailPath = request()->file('thumbnail')->store('thumbnails');
		$correctThumbnailPath = str_replace('thumbnails/', '', $thumbnailPath);
		$newImageExists = request()->file('thumbnail') !== null;

		$attributes = request()->validate([
			'titleEn'     => 'required|min:3|max:200|unique:movies,title',
			'titleKa'     => 'required|min:3|max:200|unique:movies,title',
			'movie_id'    => 'required',
			'thumbnail'   => 'required|image',
		]);
		extract($attributes);

		$data = [
			'title'     => ['en' => $titleEn, 'ka' => $titleKa],
			'movie_id'  => $movie_id,
		];

		if ($newImageExists)
		{
			$data['thumbnail'] = $correctThumbnailPath;
		}

		$quote->update($data);

		return redirect('admin/all-quotes')->with('success', __('ui.Quote Has Been Updated!'));
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return back()->with('success', __('ui.Quote Has Been Deleted!'));
	}
}
