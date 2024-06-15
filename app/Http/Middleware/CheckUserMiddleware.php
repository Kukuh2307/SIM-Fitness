<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if ($request->user()->Role === 'admin') {
            return $next($request);
        } elseif ($request->user()->Role === 'user' || $request->user()->Role === 'member') {
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
