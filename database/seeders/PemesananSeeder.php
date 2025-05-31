<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use App\Models\Pemesanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PemesananSeeder extends Seeder
{
    public function run(): void
    {
        $statusList = ['pending', 'diterima', 'ditolak'];
        $bahanList = BahanBaku::all();

        // Jika belum ada bahan baku, stop
        if ($bahanList->count() == 0) return;

        foreach (range(1, 25) as $i) {
            $bahan = $bahanList->random();
            $jumlah = match ($bahan->satuan) {
                'kg', 'liter' => rand(5, 20),
                'butir' => rand(50, 200),
                default => rand(1, 20)
            };
            $status = Arr::random($statusList);

            Pemesanan::create([
                'bahan_baku_id' => $bahan->id,
                'jumlah'        => $jumlah,
                'satuan'        => $bahan->satuan,
                'tanggal_pesan' => now()->subDays(rand(0, 30))->format('Y-m-d'),
                'status'        => $status,
            ]);
        }
    }
}
