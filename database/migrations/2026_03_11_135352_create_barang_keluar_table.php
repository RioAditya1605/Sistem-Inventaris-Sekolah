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
//         Schema::create('barang_keluar', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('barang_keluar');
//     }
// };

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();

            // relasi ke tabel inventaris
            $table->foreignId('inventaris_id')
                  ->constrained('inventaris')
                  ->cascadeOnDelete();

            // jumlah barang keluar
            $table->integer('jumlah_keluar');

            // tanggal barang keluar
            $table->date('tanggal_keluar');

            // staf yang melakukan transaksi
            $table->foreignId('staf_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
