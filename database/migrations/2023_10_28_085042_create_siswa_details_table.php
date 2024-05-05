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
        Schema::create('siswa_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')->constrained('siswas', 'id')->onDelete('cascade');
            $table->string('nisn')->unique()->nullable();
            $table->string('nik')->unique()->nullable();
            $table->string('no_kk')->unique()->nullable();
            $table->string('no_regis_kk')->unique()->nullable();
            $table->string('no_akta')->unique()->nullable();
            $table->string('tinggal_bersama')->nullable();
            $table->string('moda_transportasi')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('kip')->nullable();
            $table->integer('tb')->nullable();
            $table->integer('bb')->nullable();
            $table->integer('jumlah_sodara')->nullable();
            $table->string('tahun_ajaran')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_details');
    }
};
