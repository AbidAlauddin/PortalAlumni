<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();

        // Jika admin → bebas masuk ke semua role
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Jika role tidak sesuai → tolak
        if ($user->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }

}
