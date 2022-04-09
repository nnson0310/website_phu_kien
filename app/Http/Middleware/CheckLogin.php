<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckLogin
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
        $path = $request->path();
        if(Session::get('admin_name')){
            return $next($request);
        }
        else{
            return redirect()->to('admin/login');
        }
    }
}
