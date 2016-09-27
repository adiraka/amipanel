<?php

namespace Amipanel\Http\Middleware;

use Closure;
use Sentinel;

class SentinelMemberRedir
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
            $role = Sentinel::findRoleBySlug('member');
            if ($user->inRole($role)) {
                return redirect()->intended('member');
            }
        }
        return $next($request);
    }
}
