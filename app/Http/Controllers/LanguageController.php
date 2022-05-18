<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
	public function setLocale($language): RedirectResponse
	{
		session()->put('language', $language);
		return redirect()->back();
	}
}
