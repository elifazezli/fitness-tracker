@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-12">

    {{-- HERO HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                ✏️ Edit Workout Plan
            </h1>

            <p class="text-gray-500 mt-1">
                Update your training routine details anytime.
            </p>
        </div>

        {{-- STATUS BADGE --}}
        <span class="inline-flex px-5 py-2 rounded-full text-sm font-semibold text-white
                     {{ $plan->is_active ? 'bg-green-500' : 'bg-gray-400' }}">
            {{ $plan->is_active ? 'ACTIVE PLAN' : 'INACTIVE' }}
        </span>

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

        <form action="{{ route('workout-plans.update',$plan) }}"
              method="POST"
              class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @csrf
            @method('PUT')


            {{-- NAME --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">
                    Plan Name
                </label>

                <input type="text"
                       name="name"
                       required
                       value="{{ old('name', $plan->name) }}"
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
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
                    {{ old('description', $plan->description) }}
                </textarea>
            </div>


            {{-- DURATION --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Duration (weeks)
                </label>

                <input type="number"
                       name="duration_weeks"
                       value="{{ old('duration_weeks', $plan->duration_weeks) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- INTENSITY --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Intensity Level
                </label>

                <select name="intensity"
                        class="w-full rounded-lg border-gray-300 shadow-sm
                               focus:border-blue-500 focus:ring-blue-500">

                    <option value="beginner" {{ old('intensity', $plan->intensity) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ old('intensity', $plan->intensity) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ old('intensity', $plan->intensity) == 'advanced' ? 'selected' : '' }}>Advanced</option>

                </select>
            </div>


            {{-- FOCUS --}}
            <div>
                <label class="block text-sm font-semibold mb-1">
                    Focus Area
                </label>

                <input type="text"
                       name="focus"
                       value="{{ old('focus', $plan->focus) }}"
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
                       value="{{ old('sessions_per_week', $plan->sessions_per_week) }}"
                       class="w-full rounded-lg border-gray-300 shadow-sm
                              focus:border-blue-500 focus:ring-blue-500">
            </div>


            {{-- ACTIVE TOGGLE --}}
            <div class="md:col-span-2 mt-2 flex items-center gap-2">

                <label class="flex items-center cursor-pointer">

                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           class="sr-only peer"
                           {{ $plan->is_active ? 'checked' : '' }}>

                    <div class="
                        w-12 h-6
                        bg-gray-300
                        rounded-full
                        peer peer-checked:bg-green-500
                        after:content-['']
                        after:absolute
                        after:top-1 after:left-1
                        after:w-4 after:h-4
                        after:bg-white
                        after:rounded-full
                        after:transition-all
                        peer-checked:after:translate-x-6
                        relative">
                    </div>

                    <span class="ml-3 text-sm font-semibold text-gray-700">
                        Active Plan
                    </span>

                </label>

            </div>


            {{-- ACTIONS --}}
            <div class="md:col-span-2 mt-6 flex flex-col sm:flex-row justify-end items-center gap-4">

                <a href="{{ route('workout-plans.index') }}"
                   class="text-gray-600 hover:underline">
                    Cancel
                </a>

                <button type="submit"
                        class="px-10 py-3 rounded-full text-white font-semibold
                               bg-gradient-to-r from-blue-500 to-indigo-600
                               shadow hover:scale-105 transition">

                        💾 Update Workout Plan
                </button>

            </div>


        </form>

    </div>

</div>

@endsection
