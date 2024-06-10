<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Instruktur;

class InstrukturFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instruktur::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Nama' => $this->faker->word(),
            'Email' => $this->faker->word(),
            'Foto' => $this->faker->word(),
            'Deskripsi' => $this->faker->word(),
            'Spesialis' => $this->faker->word(),
            'Biaya' => $this->faker->word(),
        ];
    }
}
