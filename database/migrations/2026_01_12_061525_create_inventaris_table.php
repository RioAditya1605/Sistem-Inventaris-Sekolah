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
        // Schema::create('inventaris', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 50);
            $table->string('nama', 100);
            $table->integer('jumlah');
            $table->string('kondisi', 50);
            $table->string('lokasi', 100);
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->foreignId('staf_id')->constrained('stafs')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
