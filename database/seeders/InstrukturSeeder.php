<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i <= 10; $i++) {
            \App\Models\Instruktur::create([
                'Nama' => $faker->name(),
                'Email' => $faker->email(),
                'Foto' => $faker->imageUrl(),
                'Deskripsi' => $faker->text(100),
                'Spesialis' => $faker->text(10),
                'Biaya' => $faker->numberBetween(100000, 1000000),
            ]);
        }
    }
}
