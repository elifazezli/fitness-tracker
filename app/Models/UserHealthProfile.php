<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserHealthProfile extends Model
{
    protected $fillable = [
        'user_id',
        'height',
        'current_weight',
        'target_weight',
        'fat_percentage',
        'muscle_percentage',
        'age',
        'gender',
        'activity_level',
        'goals',
        'health_issues',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function measurements(): HasMany
    {
        return $this->hasMany(BodyMeasurement::class);
    }

    public function calculateBMI(): float
    {
        $heightInMeters = $this->height / 100;
        return round($this->current_weight / ($heightInMeters ** 2), 2);
    }

    public function getIdealWeight(): float
    {
        // Devine Formülü
        $heightInCm = $this->height;
        if ($this->gender === 'male') {
            $ideal = 50 + (0.91 * ($heightInCm - 152.4));
        } else {
            $ideal = 45.5 + (0.91 * ($heightInCm - 152.4));
        }
        return round($ideal, 2);
    }

    public function getWeightStatus(): string
    {
        $bmi = $this->calculateBMI();
        
        if ($bmi < 18.5) return 'underweight';
        if ($bmi < 25) return 'normal';
        if ($bmi < 30) return 'overweight';
        return 'obese';
    }
}
?>