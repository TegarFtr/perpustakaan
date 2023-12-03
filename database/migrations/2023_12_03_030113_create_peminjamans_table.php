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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('judul');
            $table->date('tanggal_peminjaman');
            $table->date('batas_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('denda')->default('0');
            $table->enum('status', ['Dipinjam', 'Terlambat', 'Dikembalikan'])->default('Dipinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
