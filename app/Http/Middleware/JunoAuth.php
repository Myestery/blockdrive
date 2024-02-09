<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JunoAuth
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
        // check for a session key called juno-user
        if ($request->hasCookie('user')) {
            return $next($request);
        }
        return redirect()->to('/login');
    }
}
