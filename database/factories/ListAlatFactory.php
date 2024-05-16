<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ListAlat;

class ListAlatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListAlat::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Nama_Alat' => $this->faker->word(),
            'Jumlah' => $this->faker->word(),
            'Kondisi_Alat' => $this->faker->word(),
            'Foto' => $this->faker->word(),
            'Merk' => $this->faker->word(),
        ];
    }
}
