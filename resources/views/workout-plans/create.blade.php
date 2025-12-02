@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-12">

    {{-- HERO HEADER --}}
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">
            🏋️ Create Workout Plan
        </h1>

        <p class="text-gray-500 mt-2">
            Design a personalized exercise program based on your goals.
        </p>
    </div>


    {{-- ERROR ALERT --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl shadow">
            <ul class="space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- MAIN CARD --}}
    <div class="bg-white shadow-xl rounded-xl p-8">

        <form action="{{ route('workout-plans.store') }}"
              method="POST"
              class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf


            {{-- PLAN NAME --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">
                    Plan Name
                </label>

                <input type="text"
                       name="name"
                       required
                       placeholder="e.g. Fat Burn Program"
                       value="{{ old('name') }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- DESCRIPTION --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">
                    Description
                </label>

                <textarea
                       name="description"
                       rows="3"
                       placeholder="Describe your program details"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>


            {{-- DURATION --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Duration (weeks)
                </label>

                <input type="number"
                       name="duration_weeks"
                       placeholder="e.g. 12"
                       value="{{ old('duration_weeks') }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- INTENSITY --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Intensity Level
                </label>

                <select
                        name="intensity"
                        class="w-full rounded-lg border-gray-300 shadow-sm
                               focus:border-blue-500 focus:ring-blue-500">

                    <option value="">Select intensity</option>

                    <option value="beginner" {{ old('intensity') == 'beginner' ? 'selected' : '' }}>
                        Beginner
                    </option>

                    <option value="intermediate" {{ old('intensity') == 'intermediate' ? 'selected' : '' }}>
                        Intermediate
                    </option>

                    <option value="advanced" {{ old('intensity') == 'advanced' ? 'selected' : '' }}>
                        Advanced
                    </option>

                </select>
            </div>


            {{-- FOCUS --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Focus Area
                </label>

                <input type="text"
                       name="focus"
                       placeholder="e.g. Core & Cardio"
                       value="{{ old('focus') }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- SESSIONS --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Sessions per Week
                </label>

                <input type="number"
                       name="sessions_per_week"
                       placeholder="e.g. 4"
                       value="{{ old('sessions_per_week') }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- START DATE --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">
                    Start Date
                </label>

                <input type="date"
                       name="start_date"
                       value="{{ old('start_date') }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- SUBMIT --}}
            <div class="md:col-span-2 text-center mt-6">

                <button type="submit"
                    class="px-10 py-3 rounded-full text-white font-semibold
                           bg-gradient-to-r from-blue-500 to-indigo-600 shadow
                           hover:scale-105 transition">

                    ✅ Create My Workout Plan
                </button>

            </div>


        </form>

    </div>

</div>

@endsection
