@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-2">{{ $plan->name }}</h1>
    <p class="text-gray-600 mb-2">{{ $plan->description }}</p>
    <p class="text-sm text-gray-500 mb-2">Duration: {{ $plan->duration_weeks }} weeks | Intensity: {{ ucfirst($plan->intensity) }}</p>
    <p class="text-sm text-gray-500 mb-4">Progress: {{ $progress }}%</p>

    <a href="{{ route('workout-plans.edit', $plan) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mb-4 inline-block">Edit Plan</a>

    <h2 class="text-xl font-semibold mb-2">Exercises</h2>
    <div class="space-y-2">
        @forelse($exercises as $exercise)
            <div class="border p-2 rounded">
                <p><strong>Day {{ $exercise->day_number }}:</strong> {{ $exercise->name }}</p>
                <p class="text-gray-500">{{ $exercise->description }}</p>
            </div>
        @empty
            <p>No exercises added yet.</p>
        @endforelse
    </div>
</div>
@endsection
