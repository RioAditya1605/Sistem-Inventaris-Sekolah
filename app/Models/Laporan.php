<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    // Relasi laporan ke inventaris (1 laporan dimiliki 1 inventaris)
    public function inventaris() {
        return $this->belongsTo(Inventaris::class);
    }
}
