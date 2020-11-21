<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class ComprobarCookie
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
        if(Request::cookie('cookie'))
            return $next($request);
        else
            return redirect(url('informarse'));
    }
}
   