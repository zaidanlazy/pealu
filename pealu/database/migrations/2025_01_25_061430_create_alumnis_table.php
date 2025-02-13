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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama_lengk');
            $table->string('jur_sekolah');
            $table->string('tahun_lulus');
            $table->string('nomor_telp');
            $table->text('alamat_rum');
            $table->string('wirausaha')->nullable();
            $table->tinyInteger('status');
            $table->string('nama_per')->nullable();
            $table->string('nama_tok')->nullable();
            $table->string('lok_bekerja')->nullable();
            $table->tinyInteger('jalur')->nullable();
            $table->string('nama_perti')->nullable();
            $table->string('jur_prodi')->nullable();
            $table->string('lok_kuliah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
