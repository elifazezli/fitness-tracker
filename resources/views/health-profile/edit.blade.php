<x-app-layout>

    {{-- HERO HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    ✏️ Edit Health Profile
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Update your body metrics to keep your progress accurate
                </p>
            </div>

            <span class="hidden md:inline-flex px-5 py-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow">
                Fitness Update
            </span>
        </div>
    </x-slot>


    <div class="py-12 bg-gray-50">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- MAIN CARD --}}
            <div class="bg-white shadow-xl rounded-xl p-8">

                <form method="POST" action="{{ route('health-profile.update') }}">
                    @csrf
                    @method('PUT')


                    {{-- GRID --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        {{-- HEIGHT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Height (cm)
                            </label>

                            <input type="number" name="height" step="0.1"
                                value="{{ old('height', auth()->user()->healthProfile->height) }}"
                                required
                                placeholder="e.g. 165"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('height')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- CURRENT WEIGHT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Current Weight (kg)
                            </label>

                            <input type="number" name="current_weight" step="0.1"
                                value="{{ old('current_weight', auth()->user()->healthProfile->current_weight) }}"
                                required
                                placeholder="e.g. 60"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('current_weight')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- TARGET WEIGHT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Target Weight (kg)
                            </label>

                            <input type="number" name="target_weight" step="0.1"
                                value="{{ old('target_weight', auth()->user()->healthProfile->target_weight) }}"
                                required
                                placeholder="e.g. 55"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('target_weight')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- FAT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Fat Percentage (%)
                            </label>

                            <input type="number" name="fat_percentage" step="0.1"
                                value="{{ old('fat_percentage', auth()->user()->healthProfile->fat_percentage) }}"
                                required
                                placeholder="e.g. 22"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('fat_percentage')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- MUSCLE --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Muscle Percentage (%)
                            </label>

                            <input type="number" name="muscle_percentage" step="0.1"
                                value="{{ old('muscle_percentage', auth()->user()->healthProfile->muscle_percentage) }}"
                                required
                                placeholder="e.g. 35"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('muscle_percentage')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- AGE --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Age
                            </label>

                            <input type="number" name="age"
                                value="{{ old('age', auth()->user()->healthProfile->age) }}"
                                required
                                placeholder="e.g. 24"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('age')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- GENDER --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Gender
                            </label>

                            <select name="gender"
                                required
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                                <option value="">Select</option>
                                <option value="male"
                                    {{ old('gender', auth()->user()->healthProfile->gender) == 'male' ? 'selected' : '' }}>
                                    Male
                                </option>

                                <option value="female"
                                    {{ old('gender', auth()->user()->healthProfile->gender) == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>

                            @error('gender')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- ACTIVITY LEVEL --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-1">
                                Activity Level
                            </label>

                            <select name="activity_level"
                                required
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                               <option value="">Select Level</option>

                               @php
                                   $levels = [
                                       'sedentary'   => 'Sedentary (Office work)',
                                       'light'       => 'Light (1–3 days/week)',
                                       'moderate'    => 'Moderate (3–5 days/week)',
                                       'active'      => 'Active (6–7 days/week)',
                                       'very_active' => 'Very Active (2x/day)',
                                   ];
                               @endphp

                               @foreach($levels as $key => $label)
                                   <option value="{{ $key }}"
                                     {{ old('activity_level', auth()->user()->healthProfile->activity_level) == $key ? 'selected' : '' }}>
                                       {{ $label }}
                                   </option>
                               @endforeach

                            </select>

                            @error('activity_level')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- GOALS --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-1">
                                Goals
                            </label>

                            <textarea name="goals"
                                rows="3"
                                placeholder="Your fitness goals"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">
                                    {{ old('goals', auth()->user()->healthProfile->goals) }}
                                </textarea>
                        </div>


                        {{-- HEALTH ISSUES --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-1">
                                Health Issues
                            </label>

                            <textarea name="health_issues"
                                rows="3"
                                placeholder="Any medical conditions"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">
                                    {{ old('health_issues', auth()->user()->healthProfile->health_issues) }}
                                </textarea>
                        </div>

                    </div>


                    {{-- ACTIONS --}}
                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-end gap-4">

                        <a href="{{ route('dashboard') }}"
                           class="text-gray-600 hover:underline">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-10 py-3 rounded-full text-white font-semibold
                                   bg-gradient-to-r from-blue-500 to-indigo-600
                                   shadow hover:scale-105 transition">

                            💾 Update Profile
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
