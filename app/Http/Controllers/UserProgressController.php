<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;
use App\Models\WorkoutExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProgressController extends Controller
{
    public function index()
    {
        $progresses = Auth::user()->progresses()
            ->with('exercise')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('progress.index', ['progresses' => $progresses]);
    }

    public function create(WorkoutExercise $exercise)
    {
        return view('progress.create', ['exercise' => $exercise]);
    }

    public function store(Request $request, WorkoutExercise $exercise)
    {
        $validated = $request->validate([
            'sets_completed' => 'required|integer|min:1|max:10',
            'reps_completed' => 'required|integer|min:1|max:100',
            'weight_used' => 'nullable|numeric|min:0',
            'duration_minutes' => 'nullable|integer|min:1|max:180',
            'calories_burned' => 'nullable|integer|min:0|max:10000',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['workout_exercise_id'] = $exercise->id;

        UserProgress::create($validated);

        return redirect()->route('progress.index')
            ->with('success', 'Progress saved.');
    }

    public function destroy(UserProgress $progress)
    {
        $this->authorize('delete', $progress);
        $progress->delete();

        return redirect()->route('progress.index')
            ->with('success', 'Progress deleted.');
    }
}
?>