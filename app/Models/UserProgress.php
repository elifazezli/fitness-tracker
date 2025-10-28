<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProgress extends Model
{
    protected $table = 'user_progresses';

    protected $fillable = [
        'user_id',
        'workout_exercise_id',
        'sets_completed',
        'reps_completed',
        'weight_used',
        'duration_minutes',
        'calories_burned',
        'notes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(WorkoutExercise::class, 'workout_exercise_id');
    }

    public function getVolumeCompleted(): float
    {
        return $this->sets_completed * $this->reps_completed * ($this->weight_used ?? 0);
    }
}
?>