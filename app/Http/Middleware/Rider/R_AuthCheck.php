<?php

namespace App\Http\Middleware\Rider;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class R_AuthCheck
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
        if(!Session::has('user_rider_id')){
            return redirect('rider-login')->with('fail', "You need to Login first");
        }
        return $next($request);
    }
}
