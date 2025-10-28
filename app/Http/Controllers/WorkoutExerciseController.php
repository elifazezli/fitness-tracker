<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPlan;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;

class WorkoutExerciseController extends Controller
{
    public function store(Request $request, WorkoutPlan $plan)
    {
        $this->authorize('update', $plan);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'day_number' => 'required|integer|min:1|max:7',
            'sets' => 'required|integer|min:1|max:10',
            'reps' => 'required|integer|min:1|max:100',
            'rest_seconds' => 'required|integer|min:0|max:300',
            'muscle_group' => 'required|string',
            'equipment' => 'nullable|string',
            'weight_kg' => 'nullable|numeric|min:0',
        ]);

        $validated['workout_plan_id'] = $plan->id;

        WorkoutExercise::create($validated);

        return redirect()->route('workout-plans.show', $plan)
            ->with('success', 'Workout added.');
    }

    public function destroy(WorkoutExercise $exercise)
    {
        $plan = $exercise->plan;
        $this->authorize('update', $plan);

        $exercise->delete();

        return redirect()->route('workout-plans.show', $plan)
            ->with('success', 'Workout deleted.');
    }
}
?>
