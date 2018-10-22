<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfileMiddleware
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
        if (Auth::user()->profile || Auth::user()->role == 'admin') {
            return $next($request);
        } else {
            toast('Crea tu perfil para poder continuar.','error','top-center')->autoClose(6000);
            return redirect()->route('perfil.create');
        }
    }
}
