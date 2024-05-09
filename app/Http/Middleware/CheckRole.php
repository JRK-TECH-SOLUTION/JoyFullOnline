<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // $user = Auth::user();
        // if (!$user || !in_array($user->role, $roles)) {
        //     return redirect()->route('welcome'); // Redirect to welcome page if user doesn't have a role or role doesn't match
        // }
        $user = Auth::user();

        // Check if user is authenticated
        if (!$user) {
            return $next($request); // Allow access if user is not authenticated
        }

        // Check if user has any of the required roles
        if (empty($roles) || in_array($user->role, $roles)) {
            return $next($request); // Allow access if user has required role
        }


        // Redirect to unauthorized page or return error response if needed
        // Example: return redirect()->route('unauthorized');
        // Example: return response()->json(['error' => 'Unauthorized'], 403);
        // Adjust the logic based on your application's requirements

        return redirect()->route('welcome'); // Redirect to welcome page by default
       
    }
}
