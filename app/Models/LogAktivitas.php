<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    // Relasi log aktivitas ke user (1 log aktivitas dimiliki 1 user)
    public function user() {
        return $this->belongsTo(User::class);
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class LogAktivitas extends Model
// {
//     protected $table = 'log_aktivitas';

//     protected $fillable = [
//         'user_id',
//         'aktivitas',
//         'nama_barang',
//         'jumlah',
//         'tipe'
//     ];

//     // Relasi log aktivitas ke user
//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }
