<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Create Health Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('health-profile.store') }}">
                        @csrf

                        {{-- Boy --}}
                        <div class="mb-4">
                            <label for="height" class="block text-sm font-medium text-gray-700">Height (cm)</label>
                            <input type="number" name="height" id="height" step="0.1" value="{{ old('height') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('height')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Mevcut Kilo --}}
                        <div class="mb-4">
                            <label for="current_weight" class="block text-sm font-medium text-gray-700">Current Weight (kg)</label>
                            <input type="number" name="current_weight" id="current_weight" step="0.1" value="{{ old('current_weight') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('current_weight')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Hedef Kilo --}}
                        <div class="mb-4">
                            <label for="target_weight" class="block text-sm font-medium text-gray-700">Target Weight (kg)</label>
                            <input type="number" name="target_weight" id="target_weight" step="0.1" value="{{ old('target_weight') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('target_weight')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Yağ Oranı --}}
                        <div class="mb-4">
                            <label for="fat_percentage" class="block text-sm font-medium text-gray-700">Fat Percentage (%)</label>
                            <input type="number" name="fat_percentage" id="fat_percentage" step="0.1" value="{{ old('fat_percentage') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('fat_percentage')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kas Oranı --}}
                        <div class="mb-4">
                            <label for="muscle_percentage" class="block text-sm font-medium text-gray-700">Muscle Percentage (%)</label>
                            <input type="number" name="muscle_percentage" id="muscle_percentage" step="0.1" value="{{ old('muscle_percentage') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('muscle_percentage')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Yaş --}}
                        <div class="mb-4">
                            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                            <input type="number" name="age" id="age" value="{{ old('age') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('age')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Cinsiyet --}}
                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                            <select name="gender" id="gender" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Aktivite Seviyesi --}}
                        <div class="mb-4">
                            <label for="activity_level" class="block text-sm font-medium text-gray-700">Aktivite Seviyesi</label>
                            <select name="activity_level" id="activity_level" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                               <option value="">Select</option>
                               <option value="sedentary" {{ old('activity_level') == 'sedentary' ? 'selected' : '' }}>Sedentary (Office work)</option>
                               <option value="light" {{ old('activity_level') == 'light' ? 'selected' : '' }}>Lightly Active (1–3 days per week)</option>
                               <option value="moderate" {{ old('activity_level') == 'moderate' ? 'selected' : '' }}>Moderately Active (3–5 days per week)</option>
                               <option value="active" {{ old('activity_level') == 'active' ? 'selected' : '' }}>Very Active (6–7 days per week)</option>
                               <option value="very_active" {{ old('activity_level') == 'very_active' ? 'selected' : '' }}>Extra Active (Twice a day)</option>

                            </select>
                            @error('activity_level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Hedefler --}}
                        <div class="mb-4">
                            <label for="goals" class="block text-sm font-medium text-gray-700">Goals (Optional)</label>
                            <textarea name="goals" id="goals" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('goals') }}</textarea>
                            @error('goals')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Sağlık Sorunları --}}
                        <div class="mb-4">
                            <label for="health_issues" class="block text-sm font-medium text-gray-700">Health Issues (Optional)</label>
                            <textarea name="health_issues" id="health_issues" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('health_issues') }}</textarea>
                            @error('health_issues')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>