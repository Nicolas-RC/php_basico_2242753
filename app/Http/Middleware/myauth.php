<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class myauth
{
    /**
     * Manejo de la seguirdad de las rutas al momento de la autenticación
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() || Auth::viaRemember()) {
            return $next($request);
        }else{
            return redirect('login');
        }
    }
}
