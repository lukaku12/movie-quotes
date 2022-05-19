<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function index(): View
	{
		return view('admin.login');
	}

	public function login(AuthRequest $request): RedirectResponse
	{
		if (!auth()->attempt(['email' => $request->email, 'password' => $request->password]))
		{
			throw ValidationException::withMessages([
				'password' => 'Your Provided credentials could not be Verified.',
			]);
		}
		session()->regenerate();

		return redirect('/admin/movies');
	}
}
