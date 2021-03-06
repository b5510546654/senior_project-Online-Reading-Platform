<?php

namespace App\Http\Middleware;

use Closure;

class ImageMiddleware
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
        if ($request->user()->imageLevel != 1 ) {
          return redirect('/')->with('status', 'You are not allowed.');
        }
        return $next($request);
    }
}
