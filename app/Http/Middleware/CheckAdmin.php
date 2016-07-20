<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if (\Auth::check()) {
            if (\Auth::user()->hasRole('administrator') && \Auth::user()->isActive()) {
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
