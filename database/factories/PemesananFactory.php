<?php

namespace Database\Factories;

use App\Models\BahanBaku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bahan = BahanBaku::inRandomOrder()->first() ?? BahanBaku::factory()->create();

        return [
            'bahan_baku_id' => $bahan->id,
            'jumlah' => $this->faker->numberBetween(1, 50),
            'satuan' => $bahan->satuan,
            'tanggal_pesan' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'diterima', 'ditolak']),
        ];
    }
}
