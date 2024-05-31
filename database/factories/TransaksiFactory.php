<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Transaksi;

class TransaksiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaksi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Nama_User' => $this->faker->word(),
            'Nama_Instruktur' => $this->faker->word(),
            'Nama_Kelas' => $this->faker->word(),
            'Total_Biaya' => $this->faker->word(),
            'Metode_Pembayaran' => $this->faker->word(),
            'Status' => $this->faker->word(),
        ];
    }
}
