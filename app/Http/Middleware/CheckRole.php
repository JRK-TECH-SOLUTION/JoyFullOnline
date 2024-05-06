<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
{
    // Check if the route is not part of the 'auth' middleware group
    if (!$request->routeIs('login') && !$request->routeIs('applylogin') && !$request->routeIs('createaccount') && !$request->routeIs('verify') && !$request->routeIs('verifyNumber')) {
        // If not part of 'auth', bypass role check
        return $next($request);
    }

    // For routes under 'auth', perform role check
    if (!$request->user() || !in_array($request->user()->role, $roles)) {
        // Unauthorized access, respond as needed
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $next($request);
}

}
