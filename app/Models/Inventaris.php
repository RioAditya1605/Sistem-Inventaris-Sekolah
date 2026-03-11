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

    // Relasi ke barang masuk (1 barang bisa memiliki banyak riwayat masuk)
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    // Relasi ke barang keluar (1 barang bisa memiliki banyak riwayat keluar)
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
