<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CanEditUser  
{
    public function handle($request, Closure $next)
    {
        $userId = $request->route('id');

        if (Auth::check() && (Auth::user()->id == (int) $userId || Auth::user()->role == "admin")) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to edit this user.');
    }
}
