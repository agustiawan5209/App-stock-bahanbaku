<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Chekrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if($role == 'Admin'  && Auth::user()->role_id != 999){
            abort(403);
        }

        if($role == 'Supplier'  && Auth::user()->role_id != 112){
            abort(403);
        }
        if($role == 'Customer'  && Auth::user()->role_id != 111){
            abort(403);
        }

        return $next($request);
    }
}
