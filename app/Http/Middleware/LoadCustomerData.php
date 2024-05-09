<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class LoadCustomerData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Load customer data here
        $user = Auth::user();
        if (!$user) {
             //set the user role to visitor
            $role = 'visitor';
        }

    
       
        if($role == 'user'){
            return redirect()->route('cdashbaord');
        }
        if($role == 'Owner'){
            return redirect()->route('dashbaord');
        }
        if($role == 'Kitchen'){
            return redirect()->route('kdashboard');
        }
        return $next($request);
    }
}
