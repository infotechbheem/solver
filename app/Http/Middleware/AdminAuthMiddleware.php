<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// class AdminAuthMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         if (Auth::check()) {
//             $user = Auth::user();
//             if ($user->hasRole('admin')) {
//                 return $next($request);
//             }
//             Auth::logout();
//             return redirect()->back()->with('warning', 'Your are unauthorize person.');
//         }
//         return redirect()->route('login')->with("warning", "Session Expires kindly login again");
//     }
// }
class AdminAuthMiddleware
{
    /**
     * Handle an incoming request and check user role(s).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with("warning", "Session expired, kindly login again");
        }

        $user = Auth::user();
        // If user is admin, allow everything
        if ($user->hasRole('admin')) {
            return $next($request);
        }

        // Otherwise check if user has any of the allowed roles
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        Auth::logout();
        return redirect()->route('login')->with('warning', 'You are unauthorized to access this area.');
    }
}
