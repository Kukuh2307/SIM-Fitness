<?php

namespace Database\Seeders;

use App\Models\ListingAlat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingAlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            ListingAlat::create([
                'Nama_Alat' => $faker->word(),
                'Jumlah' => $faker->numberBetween(1, 10),
                'Kondisi_Alat' => $faker->randomElement(['Baik', 'Perlu Perbaikan', 'Rusak Berat']),
                'Foto' => $faker->imageUrl(),
                'Merk' => $faker->word(),
            ]);
        }
    }
}
