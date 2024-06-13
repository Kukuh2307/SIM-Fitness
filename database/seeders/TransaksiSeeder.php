<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Instruktur;
use App\Models\Kelas;
use App\Models\Transaksi;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan untuk mengisi pengguna yang memiliki role 'user'
        $users = User::where('Role', 'user')->get();
        $instrukturs = Instruktur::pluck('Nama')->toArray();
        $kelases = Kelas::pluck('Nama_Kelas')->toArray();

        // Inisialisasi Faker
        $faker = Faker::create('id_ID');

        // Jika tidak ada user dengan role 'user', tampilkan pesan error
        if ($users->isEmpty()) {
            $this->command->error('Tidak ada pengguna dengan role "user" di tabel users.');
            return;
        }

        // Loop untuk membuat transaksi
        for ($i = 0; $i < 10; $i++) {
            // Ambil pengguna secara acak dari koleksi pengguna
            $user = $users->random();

            // Buat transaksi baru
            Transaksi::create([
                'Nama_User' => $user->nama, // Sesuaikan dengan nama kolom yang benar di tabel users
                'Email' => $user->email,
                'Nama_Instruktur' => $faker->randomElement($instrukturs),
                'Nama_Kelas' => $faker->randomElement($kelases),
                'Total_Biaya' => $faker->numberBetween(100000, 1000000),
                'Metode_Pembayaran' => $faker->randomElement(['BCA', 'OVO', 'DANA', 'GOPAY', 'LINKAJA', 'SHOPEEPAY']),
                'Status' => $faker->randomElement(['pending', 'failed']),
            ]);
        }
    }
}
