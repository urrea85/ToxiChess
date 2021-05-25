<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdmin
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
        if(Auth::check() && Auth::user()->role == 'admin'){
            return $next($request);
        }
        return abort(403, '¡Acceso Restringido!');
    }
}
