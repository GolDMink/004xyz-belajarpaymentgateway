<?php

namespace App\Http\Middleware;

use Closure;

class CheckLevel
{

    public function handle($request, Closure $next,...$levels)
    {
        if (in_array($request->user()->level,$levels)) {
            return $next($request);
        }else {
            return redirect('/login');
        }
    }
}
