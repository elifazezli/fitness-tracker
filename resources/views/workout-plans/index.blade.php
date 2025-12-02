@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">

    {{-- HERO HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                🏋️ My Workout Plans
            </h1>
            <p class="text-gray-500 mt-1">
                Manage all your personalized training programs.
            </p>
        </div>

        <a href="{{ route('workout-plans.create') }}"
           class="inline-flex items-center px-6 py-3 rounded-full
                  bg-gradient-to-r from-blue-500 to-indigo-600
                  text-white font-semibold shadow
                  hover:scale-105 transition">

            ➕ Create New Plan
        </a>
    </div>


    {{-- SUCCESS ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300
                    text-green-700 px-6 py-4 rounded-xl shadow">

            ✅ {{ session('success') }}

        </div>
    @endif


    {{-- PLANS GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($plans as $plan)

            <div class="bg-white border shadow-md rounded-xl p-6
                        hover:shadow-xl transition relative">

                {{-- ACTIVE BADGE --}}
                @if($plan->is_active)
                    <span class="absolute top-4 right-4 px-3 py-1 rounded-full
                                 text-xs font-semibold
                                 bg-green-100 text-green-700">

                        ACTIVE
                    </span>
                @endif


                <h2 class="text-xl font-bold mb-2">
                    {{ $plan->name }}
                </h2>

                <p class="text-gray-600 text-sm mb-2 leading-relaxed">
                    {{ Str::limit($plan->description, 90) }}
                </p>

                <div class="text-sm text-gray-500 space-y-1 mb-4">
                    <p>🗓 Duration: {{ $plan->duration_weeks }} weeks</p>
                    <p>🔥 Intensity: {{ ucfirst($plan->intensity) }}</p>
                    <p>🎯 Focus: {{ $plan->focus ?? '—' }}</p>
                    <p>📆 Sessions/Week: {{ $plan->sessions_per_week }}</p>
                </div>


                {{-- ACTIONS --}}
                <div class="flex justify-between items-center mt-4">

                    <div class="space-x-3">

                        <a href="{{ route('workout-plans.show', $plan) }}"
                           class="px-3 py-1 rounded-full text-sm
                                  bg-blue-100 text-blue-700
                                  hover:bg-blue-200 transition">

                            View
                        </a>

                        <a href="{{ route('workout-plans.edit', $plan) }}"
                           class="px-3 py-1 rounded-full text-sm
                                  bg-yellow-100 text-yellow-700
                                  hover:bg-yellow-200 transition">

                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('workout-plans.destroy',$plan) }}"
                              class="inline"
                              onsubmit="return confirm('Delete this plan permanently?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="px-3 py-1 rounded-full text-sm
                                       bg-red-100 text-red-700
                                       hover:bg-red-200 transition">

                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-3 text-center text-gray-500">

                😔 No workout plans created yet.

                <div class="mt-4">
                    <a href="{{ route('workout-plans.create') }}"
                       class="inline-flex items-center px-6 py-3 rounded-full
                              bg-gradient-to-r from-blue-500 to-indigo-600
                              text-white font-semibold shadow
                              hover:scale-105 transition">

                        ➕ Create Your First Plan
                    </a>
                </div>

            </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    <div class="mt-10">
        {{ $plans->links() }}
    </div>

</div>

@endsection
