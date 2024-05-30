<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $id_instruktur = \App\Models\Instruktur::pluck('id')->toArray();
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Kelas::create([
                'id_instruktur' => $faker->numberBetween(1, 10),
                'Nama_Kelas' => $faker->name,
                'Deskripsi' => $faker->name,
                'Biaya' => $faker->numberBetween(100000, 1000000),
                'Waktu_Mulai' => $faker->dateTime,
                'Waktu_Selesai' => $faker->dateTime,
                'Hari' => $faker->name,
                'Kuota' => $faker->numberBetween(1, 40),
                'Foto' => $faker->imageUrl,
            ]);
        }
    }
}
