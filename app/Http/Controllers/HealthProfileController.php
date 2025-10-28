<?php

namespace App\Http\Controllers;

use App\Models\UserHealthProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->healthProfile;
        
        if (!$profile) {
            return redirect()->route('health-profile.create');
        }

        $data = [
            'bmi' => $profile->calculateBMI(),
            'ideal_weight' => $profile->getIdealWeight(),
            'weight_status' => $profile->getWeightStatus(),
            'profile' => $profile,
        ];

        return view('health-profile.show', $data);
    }

    public function create()
    {
        return view('health-profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'height' => 'required|numeric|min:100|max:250',
            'current_weight' => 'required|numeric|min:20|max:300',
            'target_weight' => 'required|numeric|min:20|max:300',
            'fat_percentage' => 'required|numeric|min:0|max:100',
            'muscle_percentage' => 'required|numeric|min:0|max:100',
            'age' => 'required|integer|min:13|max:120',
            'gender' => 'required|in:male,female',
            'activity_level' => 'required|in:sedentary,light,moderate,active,very_active',
            'goals' => 'nullable|string',
            'health_issues' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        UserHealthProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $validated
        );

        return redirect()->route('health-profile.show')
            ->with('success', 'Health profile saved successfully.');
    }

    public function edit()
    {
        $profile = Auth::user()->healthProfile;
        
        if (!$profile) {
            return redirect()->route('health-profile.create');
        }

        return view('health-profile.edit', ['profile' => $profile]);
    }

    public function update(Request $request)
    {
        $profile = Auth::user()->healthProfile;

        $validated = $request->validate([
            'height' => 'required|numeric|min:100|max:250',
            'current_weight' => 'required|numeric|min:20|max:300',
            'target_weight' => 'required|numeric|min:20|max:300',
            'fat_percentage' => 'required|numeric|min:0|max:100',
            'muscle_percentage' => 'required|numeric|min:0|max:100',
            'age' => 'required|integer|min:13|max:120',
            'gender' => 'required|in:male,female',
            'activity_level' => 'required|in:sedentary,light,moderate,active,very_active',
            'goals' => 'nullable|string',
            'health_issues' => 'nullable|string',
        ]);

        $profile->update($validated);

        return redirect()->route('health-profile.show')
            ->with('success', 'Health profile updated.');
    }
}
?>
