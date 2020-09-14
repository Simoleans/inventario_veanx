<?php

namespace App\Http\Middleware;

use Closure;

class ActiveMiddleware
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

        if(auth()->user()->status == 0)
        {
            return redirect()->route('login')->withErrors('!Lo sentimos! , Usted no puede ingresar al sistema, contacte con el administrador');
        }

         return $next($request);
           
    }
}
