@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Workout Plan</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('workout-plans.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Plan Name" class="border p-2 w-full" value="{{ old('name') }}">
        <textarea name="description" placeholder="Description" class="border p-2 w-full">{{ old('description') }}</textarea>
        <input type="number" name="duration_weeks" placeholder="Duration (weeks)" class="border p-2 w-full" value="{{ old('duration_weeks') }}">
        
        <select name="intensity" class="border p-2 w-full">
            <option value="">Select Intensity</option>
            <option value="beginner" {{ old('intensity') == 'beginner' ? 'selected' : '' }}>Beginner</option>
            <option value="intermediate" {{ old('intensity') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
            <option value="advanced" {{ old('intensity') == 'advanced' ? 'selected' : '' }}>Advanced</option>
        </select>

        <input type="text" name="focus" placeholder="Focus Area" class="border p-2 w-full" value="{{ old('focus') }}">
        <input type="number" name="sessions_per_week" placeholder="Sessions per Week" class="border p-2 w-full" value="{{ old('sessions_per_week') }}">
        <input type="date" name="start_date" class="border p-2 w-full" value="{{ old('start_date') }}">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Plan</button>
    </form>
</div>
@endsection
