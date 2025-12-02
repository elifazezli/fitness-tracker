<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Measurement
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('measurements.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                            <input type="number" name="weight" id="weight" step="0.1" value="{{ old('weight') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('weight') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="fat_percentage" class="block text-sm font-medium text-gray-700">Fat Percentage (%)</label>
                            <input type="number" name="fat_percentage" id="fat_percentage" step="0.1" value="{{ old('fat_percentage') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('fat_percentage') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="muscle_percentage" class="block text-sm font-medium text-gray-700">Muscle Percentage (%)</label>
                            <input type="number" name="muscle_percentage" id="muscle_percentage" step="0.1" value="{{ old('muscle_percentage') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('muscle_percentage') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="water_percentage" class="block text-sm font-medium text-gray-700">Water Percentage (%)</label>
                            <input type="number" name="water_percentage" id="water_percentage" step="0.1" value="{{ old('water_percentage') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('water_percentage') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="bone_weight" class="block text-sm font-medium text-gray-700">Bone Weight (kg)</label>
                            <input type="number" name="bone_weight" id="bone_weight" step="0.1" value="{{ old('bone_weight') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('bone_weight') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                            <textarea name="notes" id="notes" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                            @error('notes') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
