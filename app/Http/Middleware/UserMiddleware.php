<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     // return $next($request);

    //     if (Auth::check() && Auth::user()->login_status == "0") {
    //         Auth::logout();
    //         $message = 'Your Account Has Been Deactivated. Please Contact The Administrator.';
    //         return redirect()->route('login')
    //             ->with('status', $message)
    //             ->withErrors(['error' => 'Your Account Has Been Deactivated. Please Contact The Administrator.']);
    //     }
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'user') {
            return redirect('/login');
        }

        return $next($request);
    }
}
