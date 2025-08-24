<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('#6366f1');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ['name' => 'Food', 'color' => '#ef4444', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transport', 'color' => '#3b82f6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shopping', 'color' => '#10b981', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Others', 'color' => '#f59e0b', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
