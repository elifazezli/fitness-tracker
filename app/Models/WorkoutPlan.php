<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkoutPlan extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'duration_weeks',
        'intensity',
        'focus',
        'sessions_per_week',
        'is_active',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(WorkoutExercise::class);
    }

    public function getProgressPercentage(): int
    {
        if (!$this->start_date) return 0;
        
        $start = $this->start_date;
        $end = $this->end_date ?? $start->addWeeks($this->duration_weeks);
        $today = now()->toDate();

        if ($today >= $end) return 100;
        if ($today < $start) return 0;

        $total = $start->diffInDays($end);
        $elapsed = $start->diffInDays($today);

        return (int) (($elapsed / $total) * 100);
    }
}
?>
