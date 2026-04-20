<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $fillable = [
        'inventaris_id',
        'jumlah_keluar',
        'tanggal_keluar',
        'staf_id'
    ];

    // relasi ke inventaris
    public function inventaris()
    {
        // return $this->belongsTo(Inventaris::class);
        return $this->belongsTo(\App\Models\Inventaris::class, 'inventaris_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staf_id');
    }
}
