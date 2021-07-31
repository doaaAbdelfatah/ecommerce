<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeChecker
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
       
        if ($request->age <15){
            // return redirect()
            echo "age less than 15<br>";
            // abort(401);
        }       

        return $next($request);
    }

    public function terminate($request, $response)
    {
        echo "Last action";
    }
}
