<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userAdmin
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
            // 1 admin
            // 2 encoder
            // 3 registrar
        if (auth()->user()->role == 1) {
            return $next($request);
        }else if (auth()->user()->role == 2) {
            return redirect()->route('registrar.home');
        }else if (auth()->user()->role == 3) {
            return redirect()->route('encoder.home');
        }else{
            return redirect()->route('login')->with('error','User Not Found.');
        }
        // return redirect(‘home’)->with(‘error’,"You don't have admin access.");
    }
}
