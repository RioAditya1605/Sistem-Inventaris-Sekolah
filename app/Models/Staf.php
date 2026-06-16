<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inventaris;

class Staf extends Model
{
    use HasFactory;

    /**
     * Relasi staf ke inventaris (1 staf punya banyak inventaris)
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function inventaris() {
        return $this->hasMany(Inventaris::class);
    }
}
