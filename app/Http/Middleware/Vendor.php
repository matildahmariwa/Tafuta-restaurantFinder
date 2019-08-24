<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class Vendor
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
        if (Auth::check() && Auth::user()->role == 'vendor') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'customer') {
            return redirect('/customer');
        }
        else {
            return redirect('/admin');
        }
    
        // return $next($request);
    }
}
