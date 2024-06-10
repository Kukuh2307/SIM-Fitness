<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kelas;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_Instruktur' => $this->faker->word(),
            'Nama_Kelas' => $this->faker->word(),
            'Deskripsi' => $this->faker->word(),
            'Biaya' => $this->faker->word(),
            'Waktu_Mulai' => $this->faker->dateTime(),
            'Waktu_Selesai' => $this->faker->dateTime(),
            'Hari' => $this->faker->word(),
            'Kuota' => $this->faker->word(),
            'Foto' => $this->faker->word(),
        ];
    }
}
