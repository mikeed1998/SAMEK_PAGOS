<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Session;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */

     public function handle($request, Closure $next, ...$guard)
     {
         if (Auth::guard($guard)->guest()) {
             if ($request->ajax() || $request->wantsJson()) {
                 return response('Unauthorized.', 401);
             } else {
                 Session::put('oldUrl', $request->url());
                 return redirect()->route('user.signin');
             }
         }
     
         return $next($request);
     }


    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return string|null
    //  */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         // return route('login');
    //         return redirect()->route('product.index');
    //     }
    // }
}
