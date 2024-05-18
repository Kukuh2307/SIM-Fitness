<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $user = \App\Models\User::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Informasi::create([
                'id_user' => $faker->randomElement($user),
                'Judul' => $faker->sentence(),
                'Deskripsi' => $faker->paragraph(),
            ]);
        }
    }
}
