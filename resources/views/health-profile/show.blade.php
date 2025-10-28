<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Health Profile
            </h2>
            <a href="{{ route('health-profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Edit
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kişisel Bilgiler --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">👤 Personal Information</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Height</dt>
                                <dd class="text-lg">{{ $profile->height }} cm</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Age</dt>
                                <dd class="text-lg">{{ $profile->age }} years old.</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                <dd class="text-lg">{{ $profile->gender == 'male' ? 'Male' : 'Female' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Activity Levels</dt>
                                <dd class="text-lg">
                                    @php
                                        $levels = [
                                            'sedentary' => 'Sedentary',
                                            'light' => 'Lightly Active',
                                            'moderate' => 'Moderately Active',
                                            'active' => 'Very Active',
                                            'very_active' => 'Extra Active'
                                        ];
                                    @endphp
                                    {{ $levels[$profile->activity_level] }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                {{-- Vücut Ölçümleri --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">⚖️ Body Measurements</h3>
                        <dl class="space-y-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Current Weight</dt>
                                <dd class="text-lg">{{ $profile->current_weight }} kg</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Target Weight</dt>
                                <dd class="text-lg">{{ $profile->target_weight }} kg</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">İdeal Weight</dt>
                                <dd class="text-lg">{{ $ideal_weight }} kg</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">BMI</dt>
                                <dd class="text-lg">{{ $bmi }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Fat Percentage</dt>
                                <dd class="text-lg">{{ $profile->fat_percentage }}%</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Muscle Percentage</dt>
                                <dd class="text-lg">{{ $profile->muscle_percentage }}%</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                {{-- Hedefler --}}
                @if($profile->goals)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">🎯 Goals</h3>
                        <p class="text-gray-700">{{ $profile->goals }}</p>
                    </div>
                </div>
                @endif

                {{-- Sağlık Sorunları --}}
                @if($profile->health_issues)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">🏥 Health Issues</h3>
                        <p class="text-gray-700">{{ $profile->health_issues }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>