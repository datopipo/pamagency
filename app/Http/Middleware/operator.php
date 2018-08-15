<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'operator') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'manager') {
            return redirect('/manager');
        }
        elseif (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
        elseif (Auth::check() && Auth::user()->role == 'hard') {
            return redirect('/hard');
        }
        else {
            return redirect('/customer');
        }
    }
}
