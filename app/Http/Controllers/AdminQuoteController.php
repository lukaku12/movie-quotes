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
		Quote::create($this->ValidateQuote());

		return back()->with('success', __('ui.Quote Has Been Added!'));
	}

	public function edit(Quote $quote)
	{
		return view('admin.edit-quote', [
			'quote'        => $quote,
			'quoteTitleEn' => $quote->getTranslation('title', 'en'),
			'quoteTitleKa' => $quote->getTranslation('title', 'ka'),
		]);
	}

	public function update(Quote $quote)
	{
		$quote->update($this->ValidateQuote($quote));

		return redirect('admin/all-quotes')->with('success', __('ui.Quote Has Been Updated!'));
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return back()->with('success', __('ui.Quote Has Been Deleted!'));
	}

	protected function ValidateQuote(?Quote $quote = null): array
	{
		$quote ??= new Quote();
		$newImageExists = request()->file('thumbnail') !== null;

		$attributes = request()->validate([
			'titleEn'     => 'required|min:3|max:200|unique:movies,title',
			'titleKa'     => 'required|min:3|max:200|unique:movies,title',
			'movie_id'    => 'required',
			'thumbnail'   => $quote->exists ? ['image'] : ['required', 'image'],
		]);
		extract($attributes);

		$data = [
			'title'     => ['en' => $titleEn, 'ka' => $titleKa],
			'movie_id'  => $movie_id,
		];

		if ($newImageExists)
		{
			$thumbnailPath = request()->file('thumbnail')->store('thumbnails');
			$correctThumbnailPath = str_replace('thumbnails/', '', $thumbnailPath);
			$data['thumbnail'] = $correctThumbnailPath;
		}

		return $data;
	}
}
