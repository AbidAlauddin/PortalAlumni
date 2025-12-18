<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // 1. Pastikan user login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // 2. Admin Bypass: Jika user adalah admin, izinkan akses ke manapun
        if ($user->role === 'admin') {
            return $next($request);
        }

        // 3. Logika Utama: Support Multiple Roles (Pemisah pipa '|')
        // Ubah string "company|admin" menjadi array ["company", "admin"]
        $allowed_roles = explode('|', $role);

        // Cek apakah role user saat ini ada di daftar role yang diizinkan
        if (in_array($user->role, $allowed_roles)) {
            return $next($request);
        }

        // 4. Jika tidak cocok, tolak akses
        abort(403, 'Unauthorized access - Role mismatch');
    }
}