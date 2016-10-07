<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$request->user() || $request->user()->type != 'admin')
        {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
