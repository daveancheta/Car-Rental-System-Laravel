<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotSignedInDriver
{
    public function handle($request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/driveradmin');
        }

        return $next($request);
    }
}

