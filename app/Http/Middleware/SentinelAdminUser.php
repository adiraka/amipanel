<?php

namespace Amipanel\Http\Middleware;

use Closure;
use Sentinel;

class SentinelAdminUser
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
        $user = Sentinel::getUser();
        $role = Sentinel::findRoleBySlug('admin');
        if (!$user->inRole($role)) {
            return redirect('login');
        }
        return $next($request);
    }
}
