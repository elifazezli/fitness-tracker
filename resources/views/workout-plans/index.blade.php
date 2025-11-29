@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">My Workout Plans</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('workout-plans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Create New Plan
    </a>

    <div class="mt-4 space-y-4">
        @forelse($plans as $plan)
            <div class="border p-4 rounded shadow flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold">{{ $plan->name }}</h2>
                    <p class="text-gray-600">{{ $plan->description }}</p>
                    <p class="text-sm text-gray-500">Duration: {{ $plan->duration_weeks }} weeks | Intensity: {{ ucfirst($plan->intensity) }}</p>
                </div>
                <div class="space-x-2">
                    <a href="{{ route('workout-plans.show', $plan) }}" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('workout-plans.edit', $plan) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('workout-plans.destroy', $plan) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No workout plans found.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $plans->links() }}
    </div>
</div>
@endsection
