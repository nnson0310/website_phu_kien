<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLogout
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
        if(Session::get('admin_name')){
            return redirect()->to('admin/dashboard');
        }
        else{
            return $next($request);
        }
    }
}
