<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';

    protected $fillable = [
        'inventaris_id',
        'jumlah_masuk',
        'tanggal_masuk',
        'staf_id'
    ];

    // relasi ke inventaris
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staf_id');
    }
}
