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
        Schema::create('proyek_penggalangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemohon_penggalangan_id')->constrained('pemohon_penggalangan')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->boolean('status_aktif')->default(true);
            $table->boolean('sudah_selesai')->default(false);
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('target_donasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyek_penggalangan');
    }
};
