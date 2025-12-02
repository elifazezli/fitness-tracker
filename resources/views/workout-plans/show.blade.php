@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-12">


    {{-- HERO HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 mb-10">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                🏋️ {{ $plan->name }}
            </h1>

            <p class="text-gray-600 mt-2 max-w-2xl">
                {{ $plan->description }}
            </p>

            <p class="text-sm text-gray-500 mt-3">
                🔥 Intensity: {{ ucfirst($plan->intensity) }} |
                📆 Duration: {{ $plan->duration_weeks }} weeks
            </p>
        </div>


        {{-- BADGE + EDIT --}}
        <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">

            <span class="inline-flex px-5 py-2 rounded-full text-sm font-semibold text-white
                {{ $plan->is_active ? 'bg-green-500' : 'bg-gray-400' }}">
                {{ $plan->is_active ? 'ACTIVE PLAN ✅' : 'INACTIVE PLAN' }}
            </span>

            <a href="{{ route('workout-plans.edit',$plan) }}"
               class="inline-flex items-center px-6 py-3 rounded-full
                      bg-gradient-to-r from-yellow-400 to-yellow-500
                      text-white font-semibold shadow
                      hover:scale-105 transition">
                ✏️ Edit Plan
            </a>

        </div>

    </div>


    {{-- STATS BAR --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">

        <div class="stat-box">
            <p>Duration</p>
            <h3>{{ $plan->duration_weeks }} <span>weeks</span></h3>
        </div>

        <div class="stat-box">
            <p>Intensity</p>
            <h3>{{ ucfirst($plan->intensity) }}</h3>
        </div>

        <div class="stat-box">
            <p>Sessions/Week</p>
            <h3>{{ $plan->sessions_per_week ?? '—' }}</h3>
        </div>

        <div class="stat-box">
            <p>Progress</p>
            <h3>{{ $progress }}%</h3>
        </div>

    </div>


    {{-- PROGRESS BAR --}}
    <div class="mb-14">
        <p class="text-sm text-gray-500 mb-2">
            📈 Program completion
        </p>

        <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
            <div class="bg-gradient-to-r from-green-400 to-green-600 h-4
                        rounded-full transition-all duration-500"
                 style="width: {{ $progress }}%">
            </div>
        </div>
    </div>



    {{-- EXERCISES --}}
    <h2 class="text-2xl font-bold mb-6">
        🧘 Workout Exercises
    </h2>


    @if($exercises->count())

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach($exercises as $exercise)

                <div class="exercise-card">

                    <div class="flex justify-between items-center mb-2">

                        <span class="tag-day">
                            Day {{ $exercise->day_number }}
                        </span>

                        <span class="text-gray-400 text-xs">
                            #{{ $loop->iteration }}
                        </span>

                    </div>

                    <h3 class="text-lg font-semibold text-gray-900 mb-1">
                        {{ $exercise->name }}
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $exercise->description }}
                    </p>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="text-center bg-gray-50 border rounded-xl py-12">

            <p class="text-gray-500 mb-4">
                No exercises added yet.
            </p>

            <a href="#"
               class="inline-flex items-center px-6 py-3 rounded-full
                      bg-gradient-to-r from-blue-500 to-indigo-600
                      text-white font-semibold shadow
                      hover:scale-105 transition">

                ➕ Add Exercises

            </a>

        </div>

    @endif

</div>



{{-- INLINE COMPONENT STYLES --}}
<style>

.stat-box{
    background:#fff;
    padding:1.25rem;
    border-radius:.75rem;
    box-shadow:0 4px 12px rgba(0,0,0,.05);
    border:1px solid #e5e7eb;
    text-align:center;
}

.stat-box p{
    font-size:.75rem;
    color:#6b7280;
    letter-spacing:.03em;
}

.stat-box h3{
    font-size:1.5rem;
    font-weight:700;
    color:#111827;
}

.stat-box span{
    font-size:.9rem;
}

.exercise-card{
    background:#fff;
    border-radius:1rem;
    padding:1.25rem;
    border:1px solid #e5e7eb;
    box-shadow:0 4px 12px rgba(0,0,0,.06);
    transition:.3s ease;
}

.exercise-card:hover{
    transform:translateY(-4px);
}

.tag-day{
    background:#ecfeff;
    color:#0284c7;
    padding:.25rem .75rem;
    border-radius:9999px;
    font-size:.75rem;
    font-weight:600;
}

</style>

@endsection
