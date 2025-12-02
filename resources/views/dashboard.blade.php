<x-app-layout>

    {{-- HERO HEADER --}}
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    Welcome back, {{ auth()->user()->name }} 👋
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Your personal fitness dashboard
                </p>
            </div>

            <div class="mt-3 md:mt-0">
                <span class="inline-block px-4 py-1 text-xs rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow">
                    Stay Strong 💪
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(auth()->user()->healthProfile)

            {{-- INFO CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                {{-- CARD 1 --}}
                <div class="bg-white shadow-md rounded-xl p-6 border hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold mb-4">📊 Current Status</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li><b>Weight:</b> {{ auth()->user()->healthProfile->current_weight }} kg</li>
                        <li><b>BMI:</b> {{ auth()->user()->healthProfile->calculateBMI() }}</li>
                        <li><b>Fat:</b> {{ auth()->user()->healthProfile->fat_percentage }}%</li>
                        <li><b>Muscle:</b> {{ auth()->user()->healthProfile->muscle_percentage }}%</li>
                    </ul>
                </div>


                {{-- CARD 2 --}}
                <div class="bg-white shadow-md rounded-xl p-6 border hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold mb-4">🎯 Goals</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li><b>Target:</b> {{ auth()->user()->healthProfile->target_weight }} kg</li>
                        <li><b>Ideal:</b> {{ auth()->user()->healthProfile->getIdealWeight() }} kg</li>
                        <li>
                            <b>Status:</b>
                            @php
                                $status = auth()->user()->healthProfile->getWeightStatus();
                                $map = [
                                    'underweight' => ['Underweight', 'yellow'],
                                    'normal' => ['Normal', 'green'],
                                    'overweight' => ['Overweight', 'orange'],
                                    'obese' => ['Obese', 'red'],
                                ];
                                [$text,$color] = $map[$status];
                            @endphp

                            <span class="px-3 py-1 text-xs rounded-full
                                bg-{{ $color }}-100 text-{{ $color }}-700">
                                {{ $text }}
                            </span>
                        </li>
                    </ul>
                </div>


                {{-- CARD 3 --}}
                <div class="bg-white shadow-md rounded-xl p-6 border hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold mb-4">💪 Active Plan</h3>

                    @php
                        $plan = auth()->user()->workoutPlans()
                                     ->where('is_active', true)
                                     ->first();
                    @endphp

                    @if($plan)

                        <p class="font-semibold">{{ $plan->name }}</p>
                        <p class="text-sm text-gray-500 mb-3">{{ $plan->description }}</p>

                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div
                                class="bg-gradient-to-r from-blue-500 to-indigo-600 h-3"
                                style="width: {{ $plan->getProgressPercentage() }}%">
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-1">
                            {{ $plan->getProgressPercentage() }}% completed
                        </p>

                    @else

                        <p class="text-gray-500 mb-3">
                            No active plans yet.
                        </p>

                        <a
                            href="{{ route('workout-plans.create') }}"
                            class="inline-block text-blue-600 hover:underline">
                            ➕ Create a plan
                        </a>

                    @endif
                </div>

            </div>


            {{-- MEASUREMENTS TABLE --}}
            <div class="bg-white shadow-md rounded-xl p-6 mb-10">

                <h3 class="text-lg font-semibold mb-4">📈 Recent Measurements</h3>

                @php
                    $data = auth()->user()
                                ->measurements()
                                ->latest()
                                ->take(5)
                                ->get();
                @endphp

                @if($data->count())

                    <div class="overflow-x-auto">
                        <table class="min-w-full border divide-y divide-gray-200">

                            <thead>
                                <tr class="bg-gray-100 text-gray-600 text-xs uppercase">
                                    <th class="px-4 py-2 text-left">Date</th>
                                    <th class="px-4 py-2 text-left">Weight</th>
                                    <th class="px-4 py-2 text-left">Fat</th>
                                    <th class="px-4 py-2 text-left">Muscle</th>
                                    <th class="px-4 py-2 text-left">BMI</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($data as $row)
                                    <tr class="hover:bg-blue-50 transition">
                                        <td class="px-4 py-2">{{ $row->created_at->format('d.m.Y') }}</td>
                                        <td class="px-4 py-2">{{ $row->weight }} kg</td>
                                        <td class="px-4 py-2">{{ $row->fat_percentage }}%</td>
                                        <td class="px-4 py-2">{{ $row->muscle_percentage }}%</td>
                                        <td class="px-4 py-2 font-semibold">{{ $row->bmi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                @else

                    <p class="text-gray-500 mb-2">
                        No measurement records yet.
                    </p>

                    <a href="{{ route('measurements.create') }}"
                       class="text-blue-600 hover:underline">
                        ➕ Add first measurement
                    </a>

                @endif
            </div>


            @else

                {{-- EMPTY STATE --}}
                <div class="bg-white shadow-xl rounded-xl p-10 text-center">
                    <h3 class="text-2xl font-bold mb-4">Welcome 🎉</h3>

                    <p class="text-gray-500 mb-6 max-w-md mx-auto">
                        To start tracking your fitness journey,
                        please create your personal health profile.
                    </p>

                    <a
                        href="{{ route('health-profile.create') }}"
                        class="inline-flex items-center px-6 py-3 rounded-full
                               bg-gradient-to-r from-blue-500 to-indigo-600
                               text-white font-semibold shadow hover:scale-105 transition">

                        ➕ Create Profile
                    </a>
                </div>

            @endif

        </div>
    </div>

</x-app-layout>
