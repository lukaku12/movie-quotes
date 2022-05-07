<?php

namespace App\Http\Controllers;

use App\Models\Quote;

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
			'title'     => 'required|min:3|max:200|unique:quotes,title',
			'movie_id'  => 'required',
		]);
		Quote::create($attributes);

		return redirect()->back();
	}
}
