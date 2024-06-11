<?php

namespace Database\Seeders;

use App\Livewire\Informasi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            $this->call([
                KelasSeeder::class,
                InstrukturSeeder::class,
                UserSeeder::class,
                ListingAlatSeeder::class,
                TransaksiSeeder::class,
                InformasiSeeder::class,
                RoleSeeder::class
            ]);
        } catch (\Exception $e) {
            report($e);
            throw $e;
        }
    }
}
