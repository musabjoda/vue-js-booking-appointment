<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class TimeZone
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
        
        // date_default_timezone_set(auth()->user()->timezone);
        return $next($request);

}
}
