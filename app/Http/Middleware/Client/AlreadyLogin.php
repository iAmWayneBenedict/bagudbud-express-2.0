<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlreadyLogin
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
        // if the user is already login ..when user access the signup and login page the
        // user will back to its current page
        if(Session::exists('user_id') && (url('client-login') == $request->url() || url('client-signup') == $request->url())){
            // return redirect('client-dashboard');
            return back(); 
        }
        return $next($request);
    }
}
