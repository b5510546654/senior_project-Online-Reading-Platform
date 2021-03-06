<?php

namespace App\Http\Middleware;

use Closure;

class CriticMiddleware
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
        if (!$request->user()->isCritic() ) {
          return redirect('/')->with('status', 'You are not allowed.');
        }
        return $next($request);
    }
}
