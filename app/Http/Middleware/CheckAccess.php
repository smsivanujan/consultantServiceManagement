<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $access=session()->get('Access');

        $x= Route::currentRouteName();

        if(in_array($x,$access)){
            return $next($request);

        }else{
            return redirect('/404');
        }  
       
    }
} 
