<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //en caso de que no sea reclutador, direccionar a home
        if(auth()->user()->role === 1){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
