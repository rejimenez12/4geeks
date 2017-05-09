<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class NormalAuthenticated
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

        if (Auth::user()->typeUser->type == 'normal') {



            if ($request->ajax() || $request->wantsJson()) {
                
                return response('Unauthorized.', 401);

            } else {

                return redirect()->route('normalHome');

            }


        }else{

            if ($request->ajax() || $request->wantsJson()) {

                return response('Unauthorized.', 401);

            } else {

                return redirect()->route('getLogin');

            }

        }


        return $next($request);
    }
}
