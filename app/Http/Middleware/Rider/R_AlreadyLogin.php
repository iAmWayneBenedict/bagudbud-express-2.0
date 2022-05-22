<?php

namespace App\Http\Middleware\Rider;

use Closure;
use Illuminate\Http\Request;

class R_AlreadyLogin
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
        if($request->session()->exists('user_rider_id') && (url('rider-login') == $request->url() || url('rider-signup') == $request->url())){
            return back();
        }
        return $next($request);
    }
}
