<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authorization
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
        if ($request->user()->is_admin != true) {
            return abort(404);
        } else if ($request->user()->is_admin == null) {
            return redirect()->intended('/');
        } else {
            return $next($request);
        }
    }
}
