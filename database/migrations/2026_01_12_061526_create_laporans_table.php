<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('laporans', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('barang_masuk');
            $table->integer('barang_keluar');
            $table->foreignId('inventaris_id')->constrained('inventaris')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
