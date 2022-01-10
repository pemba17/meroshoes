<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerMiddleware
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
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        else if(Auth::user()->role=='admin')
        {
              abort('403','Access Forbidden'); 
        }

        else if(Auth::user()->role=='customer')
        {
            abort('403','Access Forbidden');
        }

         else
        {
            return $next($request);
        }
    }
}
