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
			'title'     => 'required|min:3|max:200',
			'thumbnail' => 'required|image',
			'movie_id'  => 'required',
		]);
		$attributes['thumbnail'] = $correctThumbnailPath;

		Quote::create($attributes);

		return back()->with('success', 'Quote Has Been Added!');
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
			'title'     => 'required|min:3|max:200',
			'thumbnail' => 'image',
			'movie_id'  => 'required',
		]);
		if ($newImageExists)
		{
			$attributes['thumbnail'] = $correctThumbnailPath;
		}

		$quote->update($attributes);

		return redirect('admin/all-quotes')->with('success', 'Quote Has Been Updated!');
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return back()->with('success', 'Quote Has Been Deleted!');
	}
}
