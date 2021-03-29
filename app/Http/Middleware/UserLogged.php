<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            flash("Área designada para usuários não logados");
            return redirect()->back();
        }
        
        return $next($request);
    }
}
