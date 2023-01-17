<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Ad;
use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale','es');
        App::setLocale($locale);
        return $next($request);
    }
}
