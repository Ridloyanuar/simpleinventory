<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    public function Barang() {
        return $this->hasOne(Barang::class, 'kode_barang', 'kode_barang')->select('kode_barang','nama_barang', 'harga_satuan');
    }
}
