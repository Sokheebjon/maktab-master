<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->role == 1){
            return redirect()->route('admin');

        }
        if(Auth::user()->role == 2){
            return $next($request);
        }
        if(Auth::user()->role == 3){
            return redirect()->route('user');
        }
    }
}
