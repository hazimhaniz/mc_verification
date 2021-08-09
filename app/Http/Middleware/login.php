<?php

namespace App\Http\Middleware;
use Session;

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
    public function handle($request, Closure $next)
    {   

        if ($request->ajax()){
            return $next($request);
        }

        if (Session::has('logged_in') || Session::has('logged_doc')) {
        
           return $next($request); 
    
    }

        else {
            
            return redirect('/');
        }
    }
}
