<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
	public function handle(Request $request, Closure $next)
	{
		$language = Session::get('language');
		app()->setLocale($language);

		return $next($request);
	}
}
