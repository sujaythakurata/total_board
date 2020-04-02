<?php

namespace App\Http\Middleware;

use Closure;

class auth
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
        if($request->session()->get("status")=="1"){
            return $next($request);
        }
        else{
             return redirect("/")->with("data","Login to access the dashboard");
        }

    }
}
