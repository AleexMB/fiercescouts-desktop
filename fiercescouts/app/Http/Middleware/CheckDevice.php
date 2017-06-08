<?php

namespace fiercescouts\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class CheckDevice
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
        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet() || $agent->isPhone()) {
            return redirect('/wrongDevice');
        }

        return $next($request);
    }
}