<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WoluWoluMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $this->auth->shouldUse($guard);

        if ($guard == 'customer') {
            $user = $this->auth->user();

            if (null === $user) {
                return 'failed';
            }
        }
        return $next($request);
    }
}
