<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use App\Models\Jobseek;
use App\Models\Alumni;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class JobVacancySeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Ambil ID Lowongan yang valid
        $jobseekIds = Jobseek::pluck('id')->toArray();
        
        // Ambil User ID dari tabel Alumni (Pelamar adalah user yang ada di tabel alumni)
        $alumniUserIds = Alumni::pluck('user_id')->toArray();

        if (empty($jobseekIds) || empty($alumniUserIds)) {
            $this->command->error('Data Jobseek atau Alumni kosong. Pastikan urutan seeder benar.');
            return;
        }

        for ($i = 0; $i < 50; $i++) { // Membuat 50 Lamaran Dummy
            JobVacancy::create([
                'jobseek_id'     => Arr::random($jobseekIds),
                'alumni_id'      => Arr::random($alumniUserIds), // Relasi ke users.id (milik alumni)
                'status'         => Arr::random(['applied', 'reviewed', 'interview', 'accepted', 'rejected']),
                'cv_file'        => 'cv_application_' . $i . '.pdf',
                'portfolio_link' => $faker->url,
                'cover_letter'   => $faker->paragraph,
                'applied_at'     => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}