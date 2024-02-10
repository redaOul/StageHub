<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
        $response = $next($request);
        $route = $request->route()->uri;

        $authRoutes = [
            'login',
            'register',
            'logout'
        ];

        if(in_array($route, $authRoutes) || !isset(Auth::user()->is_admin))
            return $response;

        $adminRoutes = [
            'home',
            'stage',
            'demande',
            'users',
            'projet'
        ];

        $userRoutes = [
            '/'
        ];

        if(Auth::user()->is_admin) {
           if($route != '/')
                return $response;
           return redirect('/home');
        }
        if(in_array($route, $userRoutes))
            return $response;
        return redirect('/');
    }
}
