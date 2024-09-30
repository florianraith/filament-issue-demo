<?php

namespace App\Http\Middleware;

use App\GlobalTenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetGlobalTenant
{
    public function __construct(private GlobalTenant $globalTenant) {}

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->globalTenant->setId(1);
        return $next($request);
    }
}
