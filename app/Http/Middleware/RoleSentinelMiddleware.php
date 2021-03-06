<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel, Session;

class RoleSentinelMiddleware
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
        if (Sentinel::inRole('applicant') && Sentinel::getUser()->hasAccess([$request->route()->getName()])) {
            return $next($request);            
        } elseif (Sentinel::getUser()->hasAccess('admin')) {
            return $next($request);
        }
            Session::flash('warning','You dont have privilage to do that');
            return redirect('/');
    }
}
