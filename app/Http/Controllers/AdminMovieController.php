<?php

namespace App\Http\Controllers;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.login');
	}

	public function show()
	{
		return view('admin.dashboard');
	}
}
