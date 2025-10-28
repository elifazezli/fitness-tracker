<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkoutExercise extends Model
{
    protected $fillable = [
        'workout_plan_id',
        'name',
        'description',
        'day_number',
        'sets',
        'reps',
        'rest_seconds',
        'muscle_group',
        'equipment',
        'weight_kg',
        'notes',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(WorkoutPlan::class, 'workout_plan_id');
    }

    public function progresses(): HasMany
    {
        return $this->hasMany(UserProgress::class, 'workout_exercise_id');
    }

    public function getTotalVolume(): float
    {
        return $this->sets * $this->reps * ($this->weight_kg ?? 0);
    }
}
?>