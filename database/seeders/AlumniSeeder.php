<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        $majors = [
            ['prodi' => 'Teknik Informatika', 'fakultas' => 'Ilmu Komputer'],
            ['prodi' => 'Sistem Informasi', 'fakultas' => 'Ilmu Komputer'],
            ['prodi' => 'Manajemen', 'fakultas' => 'Ekonomi dan Bisnis'],
            ['prodi' => 'Akuntansi', 'fakultas' => 'Ekonomi dan Bisnis'],
        ];

        for ($i = 0; $i < 25; $i++) {
            // 1. Buat User (Akun Login)
            $user = User::create([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ]);

            $selectedMajor = Arr::random($majors);

            // 2. Buat Data Alumni (Biodata)
            Alumni::create([
                'user_id'         => $user->id,
                'fullname'        => $user->name,
                'nim'             => $faker->unique()->numerify('20#######'),
                'program_study'   => $selectedMajor['prodi'],
                'faculty'         => $selectedMajor['fakultas'],
                'graduation_year' => $faker->numberBetween(2019, 2024),
                'phone'           => $faker->phoneNumber,
                'address'         => $faker->address,
                'linkedin'        => 'https://linkedin.com/in/' . $faker->slug,
                'portfolio_url'   => $faker->url,
                'cv_path'         => 'cv_dummy.pdf',
                'bio'             => $faker->sentence(10),
            ]);
        }
    }
}