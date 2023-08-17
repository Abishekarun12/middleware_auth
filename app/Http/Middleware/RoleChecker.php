<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role === $role) {
            if ($role === 'admin') {
                return 'done';
                // return redirect()->route('admin.table'); // Redirect to admin table page
            } else if ($role === 'user') {
                dd($role);
                // return redirect()->route('user.page'); // Redirect to user page
            }
        }

        return $next($request);
    }
}
