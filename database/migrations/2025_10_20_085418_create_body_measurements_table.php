<?php
// database/migrations/xxxx_xx_xx_create_body_measurements_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('body_measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('weight'); // kg
            $table->float('fat_percentage');
            $table->float('muscle_percentage');
            $table->float('water_percentage')->nullable();
            $table->float('bone_weight')->nullable();
            $table->float('bmi')->nullable(); // Otomatik hesaplanır
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('body_measurements');
    }
};