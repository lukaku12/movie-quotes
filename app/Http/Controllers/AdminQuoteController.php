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
}
