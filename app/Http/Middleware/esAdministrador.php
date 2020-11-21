<?php

namespace App\Http\Middleware;

use Closure;

class esAdministrador
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

        if(auth()->user() && auth()->user()->esAdministrador())
            return $next($request);
        return redirect('')->with('error', 'ACCESO NO AUTORIZADO');
    }
}
