<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BahanBaku>
 */
class BahanBakuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'stok' => $this->faker->numberBetween(1, 100),
            'satuan' => $this->faker->randomElement(['kg', 'liter', 'buah']),
            'harga' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
