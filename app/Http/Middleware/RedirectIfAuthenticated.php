<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect('/');

                if(Auth::user()->role=='admin')

                return redirect()->route('backend.adminDashboard');
                
                if(Auth::user()->role=='seller')

                return redirect()->route('backend.sellerDashboard'); 

                else

                return redirect()->route('backend.customerDashboard');     



            }
        }

        return $next($request);
    }
}
