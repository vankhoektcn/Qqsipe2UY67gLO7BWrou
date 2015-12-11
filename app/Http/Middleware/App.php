<?php

namespace App\Http\Middleware;

use Closure;

class AdminApp
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// set locale for all request to display data
		if(!Session::has('locale'))
		{
			$language = Language::where('is_key_language', 1)->first();
			if (is_null($language)) {
				$language = Language::first();
			}
			Session::put('locale', $language->code);
		}

		app()->setLocale(Session::get('locale'));
		
		return $next($request);
	}
}
