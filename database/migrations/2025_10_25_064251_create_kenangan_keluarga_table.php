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
        Schema::create('kenangan_keluarga', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('judul'); // Untuk Judul
            $table->text('keterangan'); // Untuk Keterangan, 'text' bisa menampung tulisan panjang
            $table->date('tanggal'); // Untuk Tanggal
            $table->string('keluarga'); // Untuk Keluarga (nama anggota)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kenangan_keluarga');
    }
};
