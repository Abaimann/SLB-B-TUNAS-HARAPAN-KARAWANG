<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();

            // Relasi ke user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // DATA PRIBADI
            $table->string('nama_lengkap');
            $table->string('nama_panggilan')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('agama')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat_rumah')->nullable();

            // DATA PENDIDIKAN
            $table->string('asal_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();

            // DATA AYAH
            $table->string('nama_ayah')->nullable();
            $table->string('telepon_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();

            // DATA IBU
            $table->string('nama_ibu')->nullable();
            $table->string('telepon_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat_ibu')->nullable();

            // DATA WALI (OPSIONAL)
            $table->string('nama_wali')->nullable();
            $table->string('telepon_wali')->nullable();
            $table->text('alamat_wali')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb');
    }
};
