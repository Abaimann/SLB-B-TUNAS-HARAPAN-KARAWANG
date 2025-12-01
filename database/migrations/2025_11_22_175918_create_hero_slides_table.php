<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->unsigned()->default(0); // 1..5
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable(); // path storage
            $table->timestamps();
        });

        // Insert 5 empty records (order 1..5) if table kosong
        $now = Carbon::now();
        $exists = DB::table('hero_slides')->count();
        if ($exists === 0) {
            $rows = [];
            for ($i = 1; $i <= 5; $i++) {
                $rows[] = [
                    'order' => $i,
                    'title' => null,
                    'subtitle' => null,
                    'image' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            DB::table('hero_slides')->insert($rows);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
