<x-app-layout>

    {{-- HERO HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    📝 Create Your Health Profile
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Fill in your body metrics to start your fitness journey
                </p>
            </div>

            <span class="hidden md:inline-flex px-5 py-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow">
                Fitness Setup
            </span>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- MAIN CARD --}}
            <div class="bg-white rounded-xl shadow-xl p-8">

                <form method="POST" action="{{ route('health-profile.store') }}">
                    @csrf

                    {{-- GRID --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- HEIGHT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Height (cm)
                            </label>

                            <input type="number" name="height" step="0.1"
                                value="{{ old('height') }}"
                                required
                                placeholder="e.g. 165"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('height')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- CURRENT WEIGHT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Current Weight (kg)
                            </label>

                            <input type="number" name="current_weight" step="0.1"
                                value="{{ old('current_weight') }}"
                                required
                                placeholder="e.g. 60"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('current_weight')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- TARGET WEIGHT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Target Weight (kg)
                            </label>

                            <input type="number" name="target_weight" step="0.1"
                                value="{{ old('target_weight') }}"
                                required
                                placeholder="e.g. 55"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('target_weight')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- FAT --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Fat Percentage (%)
                            </label>

                            <input type="number" name="fat_percentage" step="0.1"
                                value="{{ old('fat_percentage') }}"
                                required
                                placeholder="e.g. 22"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('fat_percentage')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- MUSCLE --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Muscle Percentage (%)
                            </label>

                            <input type="number" name="muscle_percentage" step="0.1"
                                value="{{ old('muscle_percentage') }}"
                                required
                                placeholder="e.g. 35"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('muscle_percentage')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- AGE --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Age
                            </label>

                            <input type="number" name="age"
                                value="{{ old('age') }}"
                                required
                                placeholder="e.g. 24"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                            @error('age')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
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
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                    Male
                                </option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>

                            @error('gender')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- ACTIVITY LEVEL (FULL ROW) --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-1">
                                Activity Level
                            </label>

                            <select name="activity_level"
                                required
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">

                                <option value="">Select Level</option>
                                <option value="sedentary" {{ old('activity_level') == 'sedentary' ? 'selected' : '' }}>
                                    Sedentary (Office work)
                                </option>
                                <option value="light" {{ old('activity_level') == 'light' ? 'selected' : '' }}>
                                    Light (1–3 days/week)
                                </option>
                                <option value="moderate" {{ old('activity_level') == 'moderate' ? 'selected' : '' }}>
                                    Moderate (3–5 days/week)
                                </option>
                                <option value="active" {{ old('activity_level') == 'active' ? 'selected' : '' }}>
                                    Active (6–7 days/week)
                                </option>
                                <option value="very_active" {{ old('activity_level') == 'very_active' ? 'selected' : '' }}>
                                    Very Active (2x/day)
                                </option>

                            </select>

                            @error('activity_level')
                                <p class="text-sm text-red-500 mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- GOALS --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-1">
                                Goals
                            </label>

                            <textarea name="goals"
                                rows="3"
                                placeholder="What do you want to achieve?"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">{{ old('goals') }}</textarea>
                        </div>


                        {{-- HEALTH ISSUES --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold mb-1">
                                Health Issues
                            </label>

                            <textarea name="health_issues"
                                rows="3"
                                placeholder="Any medical conditions?"
                                class="w-full rounded-lg border-gray-300 shadow-sm
                                       focus:border-blue-500 focus:ring-blue-500">{{ old('health_issues') }}</textarea>
                        </div>

                    </div>


                    {{-- SUBMIT --}}
                    <div class="mt-10 text-center">

                        <button type="submit"
                            class="px-10 py-3 rounded-full text-white font-semibold
                                   bg-gradient-to-r from-blue-500 to-indigo-600
                                   shadow hover:scale-105 transition-all duration-200">

                            💾 Save My Profile
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
