<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class isDonatur
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
        if (Auth::check() && Auth::user()->level == 1) {
            return $next($request); 
        }
        elseif (Auth::check() && Auth::user()->level == 2) {
            return redirect()->route('admin');
        }
        elseif (Auth::check() && Auth::user()->level == 3) {
            return redirect()->route('powner');
        }
        else {
            return redirect()->route('login');
        }
    }
}
