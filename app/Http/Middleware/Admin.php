<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class Admin
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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'manager') {
            return redirect('/manager');
        }
        elseif (Auth::check() && Auth::user()->role == 'operator') {
            return redirect('/operator');
        }
        elseif (Auth::check() && Auth::user()->role == 'hard') {
            return redirect('/hard');
        }
        else {
            return redirect('/customer');
        }
    }

}
