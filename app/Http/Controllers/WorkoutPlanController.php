<?php


namespace App\Http\Controllers;

use App\Models\WorkoutPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutPlanController extends Controller
{
    public function index()
    {
        $plans = Auth::user()->workoutPlans()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('workout-plans.index', ['plans' => $plans]);
    }

    public function create()
    {
        return view('workout-plans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_weeks' => 'required|integer|min:1|max:52',
            'intensity' => 'required|in:beginner,intermediate,advanced',
            'focus' => 'required|string',
            'sessions_per_week' => 'required|integer|min:1|max:7',
            'start_date' => 'required|date',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_active'] = true;
        $validated['end_date'] = now()->addWeeks($validated['duration_weeks']);

        WorkoutPlan::create($validated);

        return redirect()->route('workout-plans.index')
            ->with('success', 'Workout plan created.');
    }

    public function show(WorkoutPlan $plan)
    {
        $this->authorize('view', $plan);
        $exercises = $plan->exercises()->orderBy('day_number')->get();

        return view('workout-plans.show', [
            'plan' => $plan,
            'exercises' => $exercises,
            'progress' => $plan->getProgressPercentage(),
        ]);
    }

    public function edit(WorkoutPlan $plan)
    {
        $this->authorize('update', $plan);
        return view('workout-plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request, WorkoutPlan $plan)
    {
        $this->authorize('update', $plan);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_weeks' => 'required|integer|min:1|max:52',
            'intensity' => 'required|in:beginner,intermediate,advanced',
            'focus' => 'required|string',
            'sessions_per_week' => 'required|integer|min:1|max:7',
            'is_active' => 'boolean',
        ]);

        $plan->update($validated);

        return redirect()->route('workout-plans.show', $plan)
            ->with('success', 'Plan updated.');
    }

    public function destroy(WorkoutPlan $plan)
    {
        $this->authorize('delete', $plan);
        $plan->delete();

        return redirect()->route('workout-plans.index')
            ->with('success', 'Plan deleted.');
    }
}
?>