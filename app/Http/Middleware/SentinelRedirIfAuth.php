<?php

namespace Amipanel\Http\Middleware;

use Closure;
use Sentinel;

class SentinelRedirIfAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if (Sentinel::check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
