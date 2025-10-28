<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->healthProfile)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    {{-- Kart 1: Mevcut Durum --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">📊 Mevcut Durum</h3>
                            <div class="space-y-2">
                                <p><strong>Weight:</strong> {{ auth()->user()->healthProfile->current_weight }} kg</p>
                                <p><strong>BMI:</strong> {{ auth()->user()->healthProfile->calculateBMI() }}</p>
                                <p><strong>Fat Percentage:</strong> {{ auth()->user()->healthProfile->fat_percentage }}%</p>
                                <p><strong>Muscle Percentage:</strong> {{ auth()->user()->healthProfile->muscle_percentage }}%</p>
                            </div>
                        </div>
                    </div>

                    {{-- Kart 2: Hedef --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">🎯 Hedef</h3>
                            <div class="space-y-2">
                                <p><strong>Target Weight:</strong> {{ auth()->user()->healthProfile->target_weight }} kg</p>
                                <p><strong>İdeal Weight:</strong> {{ auth()->user()->healthProfile->getIdealWeight() }} kg</p>
                                <p><strong>Status:</strong> 
                                    @php
                                        $status = auth()->user()->healthProfile->getWeightStatus();
                                        $statusText = [
                                            'underweight' => 'Underweight',
                                            'normal' => 'Normal',
                                            'overweight' => 'Overweight',
                                            'obese' => 'Obese'
                                        ];
                                    @endphp
                                    <span class="px-2 py-1 text-sm rounded 
                                        @if($status == 'normal') bg-green-100 text-green-800
                                        @elseif($status == 'underweight') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ $statusText[$status] }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Kart 3: Aktif Plan --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">💪 Active Plan</h3>
                            @php
                                $activePlan = auth()->user()->workoutPlans()->where('is_active', true)->first();
                            @endphp
                            @if($activePlan)
                                <p><strong>{{ $activePlan->name }}</strong></p>
                                <p class="text-sm text-gray-600 mt-2">{{ $activePlan->description }}</p>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $activePlan->getProgressPercentage() }}%"></div>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">{{ $activePlan->getProgressPercentage() }}% Completed</p>
                                </div>
                            @else
                                <p class="text-gray-600"> No active plans yet.</p>
                                <a href="{{ route('workout-plans.create') }}" class="mt-4 inline-block text-blue-600 hover:underline">
                                    Create plan 
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Son Ölçümler --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">📈 Recent Measurements </h3>
                        @php
                            $recentMeasurements = auth()->user()->measurements()->orderBy('created_at', 'desc')->take(5)->get();
                        @endphp
                        @if($recentMeasurements->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Weight</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fat %</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Muscle %</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">BMI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($recentMeasurements as $measurement)
                                            <tr>
                                                <td class="px-4 py-2">{{ $measurement->created_at->format('d.m.Y') }}</td>
                                                <td class="px-4 py-2">{{ $measurement->weight }} kg</td>
                                                <td class="px-4 py-2">{{ $measurement->fat_percentage }}%</td>
                                                <td class="px-4 py-2">{{ $measurement->muscle_percentage }}%</td>
                                                <td class="px-4 py-2">{{ $measurement->bmi }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-600">No measurements records yet.</p>
                            <a href="{{ route('measurements.create') }}" class="mt-2 inline-block text-blue-600 hover:underline">
                                Add First Measurement
                            </a>
                        @endif
                    </div>
                </div>

            @else
                {{-- Profil yoksa --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold mb-4">Welcome! 👋</h3>
                        <p class="text-gray-600 mb-6">To get started,first create your health profile.</p>
                        <a href="{{ route('health-profile.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                           Create Profile 
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>