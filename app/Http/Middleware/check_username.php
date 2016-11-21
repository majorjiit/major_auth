<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class check_username
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->username!=Auth::user()->username)
        {
            return redirect('user/'.Auth::user()->username.'/profile');
        }

        return $next($request);
    }
}
