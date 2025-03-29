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
        Schema::create('donatur', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('proyek_penggalangan_id')->constrained('proyek_penggalangan')->onDelete('cascade');
            $table->integer('jumlah_donasi');
            $table->text('catatan')->nullable();
            $table->boolean('sudah_dibayar')->default(false);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donatur');
    }
};
