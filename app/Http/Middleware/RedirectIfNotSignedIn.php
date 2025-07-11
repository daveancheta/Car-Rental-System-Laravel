<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotSignedIn
{
    public function handle($request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/loginadmin'); // 👈 your custom redirect
        }

        return $next($request);
    }
}

