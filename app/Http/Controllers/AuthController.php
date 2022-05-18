<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function index(): View
	{
		return view('admin.login');
	}

	public function login(): RedirectResponse
	{
		// LoginRequest
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);
		if (!auth()->attempt($attributes))
		{
			throw ValidationException::withMessages([
				'password' => 'Your Provided credentials could not be Verified.',
			]);
		}
		session()->regenerate();

		return redirect('/admin/movies');
	}
}
