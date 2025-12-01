<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('galeri_id')->nullable()->constrained('galeris')->onDelete('set null');
            $table->string('kategori')->nullable();
            $table->string('nama_prestasi');
            $table->string('tingkat');
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestasis');
    }
};
