<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } else if($guard == 'api') {
            if(!$this->hasPermissionToApiCall($request)) {
                return response('Unauthorized.', 401);
            }
        }
        return $next($request);
    }

    private function hasPermissionToApiCall($request)
    {
        //Add in an extra layer of custom validation for the user to check if they're allowed to do the API call
        $path = $request->path();
        $user = Auth::guard('api')->user();
        var_dump($user);
        return true;
    }

}