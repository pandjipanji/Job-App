<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Session;

class SentinelMiddleware
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
        if (Sentinel::guest()) {
            Session::flash('warning','You have to login first in order to do that');
            return redirect()->guest('login');
        } 
        
        return $next($request);
    }
}
