<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    public function Pelanggan() {
        return $this->hasOne(Pelanggan::class, 'kode_pelanggan', 'kode_pelanggan');
    }

    public function DetailPenjualan() {
        return $this->hasMany(DetailPenjualan::class, 'kode_penjualan', 'kode_penjualan');
    }
}
