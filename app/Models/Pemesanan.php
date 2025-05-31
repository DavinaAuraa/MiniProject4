<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'bahan_baku_id',
        'jumlah',
        'satuan',
        'tanggal_pesan',
        'status'
    ];

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class);
    }
}
