<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // 1. Buat Alumni (User + Profile)
            AlumniSeeder::class, 
            
            // 2. Buat Company (User + Profile) -> PENTING DULUAN SEBELUM JOBSEEK
            CompanySeeder::class, 
            
            // 3. Buat Lowongan (Butuh data Company)
            JobseekSeeder::class, 
            
            // 4. Buat Pelamar/Lamaran (Butuh data Alumni & Lowongan)
            JobVacancySeeder::class, 
        ]);
    }
}