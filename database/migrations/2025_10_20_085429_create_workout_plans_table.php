<?php
// database/migrations/xxxx_xx_xx_create_workout_plans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workout_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Örn: "Kas Kazanma Programı"
            $table->text('description');
            $table->integer('duration_weeks'); // Kaç hafta
            $table->enum('intensity', ['beginner', 'intermediate', 'advanced']);
            $table->string('focus'); // Örn: "muscle_gain", "fat_loss", "balance"
            $table->integer('sessions_per_week');
            $table->boolean('is_active')->default(true);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_plans');
    }
};