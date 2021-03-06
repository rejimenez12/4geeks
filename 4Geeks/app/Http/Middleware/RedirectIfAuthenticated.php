<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if(Auth::user()->typeUser->type == 'admin' ){

                return redirect('/admin/home');

            }else if(Auth::user()->tipoUser->nombre == 'normal' ){

                return redirect('/normal/home');

            }

        }

        return $next($request);
    }
}
