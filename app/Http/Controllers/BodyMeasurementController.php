<?php

namespace App\Http\Controllers;

use App\Models\BodyMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BodyMeasurementController extends Controller
{
    public function index()
    {
        $measurements = Auth::user()->measurements()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('measurements.index', ['measurements' => $measurements]);
    }

    public function create()
    {
        return view('measurements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'weight' => 'required|numeric|min:20|max:300',
            'fat_percentage' => 'required|numeric|min:0|max:100',
            'muscle_percentage' => 'required|numeric|min:0|max:100',
            'water_percentage' => 'nullable|numeric|min:0|max:100',
            'bone_weight' => 'nullable|numeric|min:0|max:50',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        BodyMeasurement::create($validated);

        // Son ölçümü profilde güncelle
        Auth::user()->healthProfile->update([
            'current_weight' => $validated['weight'],
            'fat_percentage' => $validated['fat_percentage'],
            'muscle_percentage' => $validated['muscle_percentage'],
        ]);

        return redirect()->route('measurements.index')
            ->with('success', 'Ölçüm kaydedildi.');
    }

    public function show(BodyMeasurement $measurement)
    {
        $this->authorize('view', $measurement);
        return view('measurements.show', ['measurement' => $measurement]);
    }

    public function destroy(BodyMeasurement $measurement)
    {
        $this->authorize('delete', $measurement);
        $measurement->delete();

        return redirect()->route('measurements.index')
            ->with('success', 'Ölçüm silindi.');
    }
}
?>