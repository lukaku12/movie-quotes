<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.login');
	}

	public function show()
	{
		return view('admin.all-movies');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);
		if (!auth()->attempt($attributes))
		{
			throw ValidationException::withMessages([
				'email' => 'Your Provided credentials could not be Verified.',
			]);
		}
		session()->regenerate();

		return redirect('/admin/all-movies');
	}
}
