<?php

namespace App\Models;

use App\Models\Penyewa;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama',
        'harga_barang',
        'gambar',
        'deskripsi',
        'diskon',
        'kategori',
        'status',
    ];

    public function penyewa()
    {
        return $this->hasMany(Penyewa::class, 'nama_id', 'id');
    }
}
