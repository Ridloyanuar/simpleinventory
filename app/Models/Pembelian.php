<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    public function detailPembelian(){
        return $this->hasMany(DetailPembelian::class, 'kode_pembelian');
    }
}
