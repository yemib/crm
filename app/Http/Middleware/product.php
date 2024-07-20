<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class product
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

        $manage  = permission_count(auth()->user()->id  ,  44);
        if( $manage == 0) {

          if(auth()->user()->is_admin  == 0 ){

             return  back();
          }

        }


        return $next($request);
    }
}
