<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::user()->Role);
        if ($request->user()->Role === 'admin') {
            return $next($request);
        } elseif ($request->user()->Role === 'user' || $request->user()->Role === 'member') {
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    }
}
