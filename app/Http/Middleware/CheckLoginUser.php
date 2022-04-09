<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckLoginUser
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
        if(Session::get('username')){
            return $next($request);
        }
        else{
            return redirect()->route('get_login');
        }
    }
}
