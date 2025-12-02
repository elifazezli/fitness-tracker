<x-app-layout>

    {{-- HERO HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    📋 My Health Profile
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Overview of your body metrics and personal goals
                </p>
            </div>

            <a href="{{ route('health-profile.edit') }}"
               class="inline-flex items-center px-6 py-3
                      bg-gradient-to-r from-gray-800 to-gray-600
                      text-white text-sm font-semibold rounded-full shadow
                      hover:scale-105 transition">

                ✏️ Edit Profile
            </a>
        </div>
    </x-slot>


    <div class="py-12 bg-gray-50">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div
                    class="mb-6 bg-green-100 border border-green-300
                           text-green-700 px-6 py-4 rounded-xl shadow">

                    ✅ {{ session('success') }}

                </div>
            @endif


            {{-- MAIN GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">

                {{-- PERSONAL INFO --}}
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-xl p-8 border">

                    <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        👤 Personal Information
                    </h3>

                    <div class="grid grid-cols-2 gap-4">

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Height</p>
                            <p class="text-xl font-semibold">{{ $profile->height }} cm</p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Age</p>
                            <p class="text-xl font-semibold">{{ $profile->age }}</p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Gender</p>
                            <p class="text-xl font-semibold">
                                {{ $profile->gender === 'male' ? 'Male' : 'Female' }}
                            </p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Activity Level</p>

                            @php
                                $levels = [
                                    'sedentary' => 'Sedentary',
                                    'light' => 'Light',
                                    'moderate' => 'Moderate',
                                    'active' => 'Very Active',
                                    'very_active' => 'Extra Active'
                                ];
                            @endphp

                            <p class="text-xl font-semibold">
                                {{ $levels[$profile->activity_level] }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- BODY MEASUREMENTS --}}
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-xl p-8 border">

                    <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        ⚖️ Body Measurements
                    </h3>

                    @php
                        $status = match(true) {
                            $bmi < 18.5 => ['Underweight','yellow'],
                            $bmi < 25   => ['Normal','green'],
                            $bmi < 30   => ['Overweight','orange'],
                            default     => ['Obese','red'],
                        };
                    @endphp

                    <div class="grid grid-cols-2 gap-4">

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Current Weight</p>
                            <p class="text-xl font-semibold">{{ $profile->current_weight }} kg</p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Target Weight</p>
                            <p class="text-xl font-semibold">{{ $profile->target_weight }} kg</p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Ideal Weight</p>
                            <p class="text-xl font-semibold">{{ $ideal_weight }} kg</p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">BMI</p>

                            <p class="text-xl font-bold">
                                {{ $bmi }}

                                <span
                                    class="ml-2 px-2 py-1 rounded-full text-xs
                                           bg-{{ $status[1] }}-100
                                           text-{{ $status[1] }}-700">
                                    {{ $status[0] }}
                                </span>
                            </p>

                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Fat %</p>
                            <p class="text-xl font-semibold">
                                {{ $profile->fat_percentage }}%
                            </p>
                        </div>

                        <div class="stat-card">
                            <p class="text-sm text-gray-500">Muscle %</p>
                            <p class="text-xl font-semibold">
                                {{ $profile->muscle_percentage }}%
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- GOALS & ISSUES --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                @if($profile->goals)
                    <div class="bg-white border shadow-md hover:shadow-xl transition rounded-xl p-8">

                        <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
                            🎯 Goals
                        </h3>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $profile->goals }}
                        </p>

                    </div>
                @endif


                @if($profile->health_issues)
                    <div class="bg-white border shadow-md hover:shadow-xl transition rounded-xl p-8">

                        <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
                            🏥 Health Issues
                        </h3>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $profile->health_issues }}
                        </p>

                    </div>
                @endif

            </div>


        </div>
    </div>


    {{-- INLINE STAT CARD STYLE --}}
    <style>
        .stat-card {
            background: rgb(249 250 251);
            border-radius: 0.75rem;
            padding: 1rem;
            text-align: center;
        }
    </style>

</x-app-layout>
