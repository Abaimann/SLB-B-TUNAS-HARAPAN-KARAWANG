<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sambutans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kepala_guru_id')->nullable()->constrained('gurus')->nullOnDelete();
            $table->foreignId('foto_kepala_id')->nullable()->constrained('gurus')->nullOnDelete();
            $table->text('sambutan_kepala')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sambutans');
    }
};
