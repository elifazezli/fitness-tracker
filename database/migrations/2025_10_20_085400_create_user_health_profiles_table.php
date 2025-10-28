<?php
// database/migrations/xxxx_xx_xx_create_user_health_profiles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_health_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('height'); // cm cinsinden
            $table->float('current_weight'); // kg cinsinden
            $table->float('target_weight');
            $table->float('fat_percentage'); // Yağ oranı
            $table->float('muscle_percentage'); // Kas oranı
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->enum('activity_level', ['sedentary', 'light', 'moderate', 'active', 'very_active']);
            $table->text('goals')->nullable(); // Hedefler
            $table->text('health_issues')->nullable(); // Sağlık sorunları
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_health_profiles');
    }
};