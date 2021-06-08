<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class mustBeEmployee
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
        if ($request->user()->role != 'employee')
            return redirect('/')->with('error','YOU MUST BE AN EMPLOYEE TO ACCESS THE PAGE');
        return $next($request);
    }
}
