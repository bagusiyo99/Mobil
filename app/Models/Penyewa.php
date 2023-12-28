<?php

namespace App\Models;

use App\Models\Diskon;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $fillable = [
        'name',
        'tujuan',
        'alamat',
        'tgl_boking',
        'tgl_selesai',
        'hp',
        'jam',
        'nama_id', // Pastikan ini ada di dalam $fillable
    ];

    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'nama_id', 'id');
    }
}
