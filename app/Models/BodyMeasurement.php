<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BodyMeasurement extends Model
{
    protected $fillable = [
        'user_id',
        'weight',
        'fat_percentage',
        'muscle_percentage',
        'water_percentage',
        'bone_weight',
        'bmi',
        'notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($user = auth()->user()) {
                $profile = $user->healthProfile;
                if ($profile) {
                    $heightInMeters = $profile->height / 100;
                    $model->bmi = round($model->weight / ($heightInMeters ** 2), 2);
                }
            }
        });
    }
}
?>