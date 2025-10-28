<?php
// database/migrations/xxxx_xx_xx_create_workout_exercises_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workout_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workout_plan_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Egzersiz adı
            $table->text('description');
            $table->integer('day_number'); // Hangi gün
            $table->integer('sets');
            $table->integer('reps');
            $table->integer('rest_seconds');
            $table->string('muscle_group'); // Örn: "chest", "back", "legs"
            $table->string('equipment')->nullable(); // Örn: "dumbbell", "barbell"
            $table->float('weight_kg')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_exercises');
    }
};