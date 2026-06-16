<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('barang_masuk', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('barang_masuk');
//     }
// };

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();

            // relasi ke tabel inventaris
            $table->foreignId('inventaris_id')
                  ->constrained('inventaris')
                  ->cascadeOnDelete();

            // jumlah barang yang masuk
            $table->integer('jumlah_masuk');

            // tanggal barang masuk
            $table->date('tanggal_masuk');

            // staf yang melakukan input
            $table->foreignId('staf_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
