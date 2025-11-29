<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HeadAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'headadmin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
