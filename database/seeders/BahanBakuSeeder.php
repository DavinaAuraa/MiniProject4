<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BahanBaku;

class BahanBakuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Gula Pasir',
                'stok' => 100,
                'satuan' => 'kg',
                'harga' => 12000,
            ],
            [
                'nama' => 'Tepung Terigu',
                'stok' => 200,
                'satuan' => 'kg',
                'harga' => 9000,
            ],
            [
                'nama' => 'Telur Ayam',
                'stok' => 300,
                'satuan' => 'butir',
                'harga' => 2000,
            ],
            [
                'nama' => 'Mentega',
                'stok' => 50,
                'satuan' => 'kg',
                'harga' => 45000,
            ],
            [
                'nama' => 'Coklat Bubuk',
                'stok' => 25,
                'satuan' => 'kg',
                'harga' => 80000,
            ],
            [
                'nama' => 'Ragi',
                'stok' => 10,
                'satuan' => 'kg',
                'harga' => 35000,
            ],
            [
                'nama' => 'Susu Cair',
                'stok' => 100,
                'satuan' => 'liter',
                'harga' => 15000,
            ],
            [
                'nama' => 'Keju Parut',
                'stok' => 30,
                'satuan' => 'kg',
                'harga' => 70000,
            ],
        ];

        foreach ($data as $bahan) {
            BahanBaku::create($bahan);
        }
    }
}
