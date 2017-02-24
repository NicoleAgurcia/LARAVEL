<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (Auth::user()->is_admin !== 1) {
            return redirect('/');
        } 

        return $next($request);
    }
     public function handlee($request, Closure $next){
        if (Auth::user()->is_agent !== 2) {
            return redirect('/');
        } 

        return $next($request);
    }
}
