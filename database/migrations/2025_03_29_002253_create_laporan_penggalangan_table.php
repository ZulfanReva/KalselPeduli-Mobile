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
        Schema::create('laporan_penggalangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_penggalangan_id')->constrained('proyek_penggalangan')->onDelete('cascade');
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_penggalangan');
    }
};
