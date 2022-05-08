<?php

namespace App\Http\Controllers;

use App\Models\Quote;

// todo fix n+1 problem
class AdminQuoteController extends Controller
{
	public function index(Quote $quote)
	{
		return view('admin.all-quotes', [
			'quotes' => $quote::all(),
		]);
	}

	public function show(Quote $quote)
	{
		return view('admin.add-quote');
	}

	public function create()
	{
		$attributes = request()->validate([
			'title'     => 'required|min:3|max:200',
			'thumbnail' => 'required|image',
			'movie_id'  => 'required',
		]);
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

		Quote::create($attributes);

		return redirect()->back();
	}

	public function edit(Quote $quote)
	{
		return view('admin.edit-quote', ['quote' => $quote]);
	}

	public function update(Quote $quote)
	{
		$newImageExists = request()->file('thumbnail') !== null;

		$attributes = request()->validate([
			'title'     => 'required|min:3|max:200',
			'thumbnail' => 'image',
			'movie_id'  => 'required',
		]);
		if ($newImageExists)
		{
			$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
//		dd($attributes);

		$quote->update($attributes);

		return redirect('admin/all-quotes');
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return back();
	}
}
