<?php

namespace Database\Seeders;

use App\Models\Jobseek;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class JobseekSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // AMBIL HANYA USER ID YANG SUDAH TERDAFTAR DI TABEL COMPANIES
        // Ini memastikan setiap lowongan dimiliki oleh perusahaan yang valid
        $companyUserIds = Company::pluck('user_id')->toArray();

        if (empty($companyUserIds)) {
            $this->command->error('Tabel companies kosong. Jalankan CompanySeeder terlebih dahulu!');
            return;
        }

        for ($i = 0; $i < 30; $i++) { // Membuat 30 Lowongan Dummy
            Jobseek::create([
                'user_id'          => Arr::random($companyUserIds), // Pilih random dari user company
                'title'            => $faker->jobTitle,
                'description'      => $faker->paragraphs(2, true),
                'location'         => $faker->city,
                'job_type'         => Arr::random(['full-time', 'part-time', 'internship']), // Sesuaikan enum db
                'work_system'      => Arr::random(['WFO', 'WFH', 'Hybrid']),
                'salary_min'       => $faker->numberBetween(4000000, 6000000),
                'salary_max'       => $faker->numberBetween(7000000, 15000000),
                'experience_level' => Arr::random(['Junior', 'Middle', 'Senior']),
                'education_level'  => Arr::random(['D3', 'S1']),
                'quota'            => $faker->numberBetween(1, 5),
                'status'           => 'open',
                'deadline'         => $faker->dateTimeBetween('+1 week', '+2 months'),
            ]);
        }
    }
}