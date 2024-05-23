<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            \App\Models\User::create([
                'Nama' => $faker->name,
                'Email' => $faker->email,
                'Password' => $faker->password,
                'Foto' => $faker->imageUrl,
                'Tanggal_bergabung' => $faker->date,
                'Tanggal_berakhir' => $faker->date,
                'Role' => 'user'
            ]);
        }
        
    }
}
