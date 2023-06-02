<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        
        if(!Auth::check()){
            // return redirect('/');
        }else{
            if(Auth::guard()->user()->role == 'Client'){
                return redirect()->route('client.job.detail');
            }
            else if(Auth::guard()->user()->role == 'Talent'){
                return redirect()->route('talent.care');
            }
        }

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $redirectRoute = $guard === 'admin' ? RouteServiceProvider::ADMIN_HOME : RouteServiceProvider::HOME;
                
                return redirect($redirectRoute);
            }
        }
        // dd($request->getPathInfo());
        return $next($request);
    }
}
