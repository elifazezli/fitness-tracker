<?php
// database/migrations/xxxx_xx_xx_create_user_progresses_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_progresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('workout_exercise_id')->nullable()->constrained('workout_exercises')->onDelete('set null');
            $table->integer('sets_completed');
            $table->integer('reps_completed');
            $table->float('weight_used')->nullable();
            $table->integer('duration_minutes')->nullable();
            $table->integer('calories_burned')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_progresses');
    }
};