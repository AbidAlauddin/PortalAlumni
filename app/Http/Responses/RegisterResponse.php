<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        // Cek Role dan Redirect sesuai keinginan
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } 
        
        if ($user->role === 'company') {
            return redirect()->intended('/company/dashboard');
        }

        // Default untuk Alumni / User biasa
        return redirect()->intended('/home');
    }
}