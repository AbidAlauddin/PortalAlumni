<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // 1. BERSIHKAN DATA LAMA (Agar tidak duplikat saat di-seed ulang)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::where('role', 'company')->delete(); // Hapus user role company
        Company::truncate(); // Kosongkan tabel company
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Password default untuk semua akun
        $password = Hash::make('password123');

        // 2. LOOPING MEMBUAT 10 DATA BERURUTAN
        for ($i = 1; $i <= 10; $i++) {
            
            // Buat User untuk Login
            $user = User::create([
                'name'     => "Admin Company $i",
                'email'    => "company{$i}@gmail.com", // company1@gmail.com, dst.
                'password' => $password,
                'role'     => 'company',
            ]);

            // Buat Profil Perusahaan
            Company::create([
                'user_id'     => $user->id,
                'name'        => "PT Company $i Sejahtera",
                'email'       => "hrd@company{$i}.com", // Email publik perusahaan
                'phone'       => "0812000000{$i}", // Nomor HP urut
                'website'     => "https://www.company{$i}.com",
                'address'     => "Jl. Industri Raya No. $i, Jakarta",
                'description' => "Ini adalah deskripsi resmi untuk PT Company $i. Perusahaan ini bergerak di bidang Teknologi dan Informasi.",
                'industry'    => 'Technology',
                'logo'        => null,
            ]);
        }
    }
}