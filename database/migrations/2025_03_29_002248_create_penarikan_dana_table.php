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
        Schema::create('penarikan_dana', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_penggalangan_id')->constrained('proyek_penggalangan')->onDelete('cascade');
            $table->foreignId('pemohon_penggalangan_id')->constrained('pemohon_penggalangan')->onDelete('cascade');
            $table->boolean('sudah_diterima')->default(false);
            $table->boolean('sudah_disetujui')->default(false);
            $table->unsignedBigInteger('jumlah_diminta');
            $table->unsignedBigInteger('jumlah_diterima')->nullable();
            $table->string('nama_bank');
            $table->string('nama_rekening');
            $table->string('nomor_rekening');
            $table->string('bukti_penarikan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penarikan_dana');
    }
};
