<?php

namespace Amipanel\Http\Middleware;

use Closure;
use Sentinel;

class SentinelManagerRedir
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
        if (Sentinel::check()) {
            $user = Sentinel::getUser();
            $role = Sentinel::findRoleBySlug('manager');
            if ($user->inRole($role)) {
                return redirect()->intended('manager');
            }
        }
        return $next($request);
    }
}
