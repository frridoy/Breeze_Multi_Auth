<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){

            return redirect()->route('login');
        }

        if(auth()->user()->role == 1){

            return $next($request);
        }

        elseif(auth()->user()->role == 2){

            return redirect()->route('admin.dashboard');
        }


        elseif(auth()->user()->role == 3){

            return redirect()->route('dashboard');
        }


        
    }
}
