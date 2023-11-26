<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->role == 'staff') {
            return redirect()->route('/');
        }
        return $next($request);
    }
}
