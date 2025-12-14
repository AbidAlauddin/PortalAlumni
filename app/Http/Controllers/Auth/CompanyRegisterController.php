<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Sesuaikan dengan model User Anda
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class CompanyRegisterController extends Controller
{
    /**
     * Menampilkan form registrasi perusahaan.
     */
    public function create()
    {
        // Pastikan nama view sesuai dengan file yang Anda buat sebelumnya
        return view('livewire.auth.register-company');
    }

    /**
     * Menangani proses simpan data registrasi perusahaan.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'phone' => ['required', 'string', 'max:20'],
            'industry' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
            'logo' => ['nullable', 'image', 'max:2048'], // Validasi logo
            'website' => ['nullable', 'url'],
        ]);

        // 2. Buat Akun User Terlebih Dahulu (Untuk Login)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'company', // Pastikan kolom role ada di tabel users
        ]);

        // 3. Proses Upload Logo (Jika ada)
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('company_logos', 'public');
        }

        // 4. Buat Data Company (HUBUNGKAN DENGAN USER_ID)
        Company::create([
            'user_id' => $user->id, // <--- INI BAGIAN PENTING YANG SEBELUMNYA HILANG
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'address' => $request->address,
            'description' => $request->description,
            'industry' => $request->industry,
            'logo' => $logoPath,
        ]);

        // 5. Trigger Event & Auto Login
        event(new Registered($user));
        Auth::login($user);

        // 6. Redirect ke Dashboard
        return redirect(route('home'));
    }
}