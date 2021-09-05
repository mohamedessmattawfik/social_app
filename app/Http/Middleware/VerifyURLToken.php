<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyURLToken
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
        if ($request->get('token') != 'ABC') {
            abort(401);
        }
        return $next($request);
    }
}
