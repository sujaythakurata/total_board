<?php

namespace App\Http\Middleware;

use Closure;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($req, Closure $next)
    {
        if($req->session()->get("status")=="1"){
            return redirect('/dashboard');
        }else{
            return $next($req);
        }
    }
}
