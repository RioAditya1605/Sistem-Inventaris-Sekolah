<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{   

    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'kode',
        'nama',
        'jumlah',
        'kondisi',
        'lokasi',
        'tanggal_masuk',
        'tanggal_keluar',
        'staf_id'
    ];

    // Relasi ke staf (1 inventaris dimiliki 1 staf)
    public function staf() {
        return $this->belongsTo(Staf::class);
    }

    // Relasi ke laporan (1 inventaris punya banyak laporan)
    public function laporan() {
        return $this->hasMany(Laporan::class);
    }
}
