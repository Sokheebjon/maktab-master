<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if (\app()->getLocale() === "uz") {
//            App::setLocale('en');
//        }
//        else if (\app()->getLocale() === "en") {
//            App::setLocale('uz');
//        }
        return $next($request);
    }
}
