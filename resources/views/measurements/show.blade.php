<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Measurement Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-2">
                    <p><strong>Date:</strong> {{ $measurement->created_at->format('d/m/Y') }}</p>
                    <p><strong>Weight:</strong> {{ $measurement->weight }} kg</p>
                    <p><strong>Fat %:</strong> {{ $measurement->fat_percentage }} %</p>
                    <p><strong>Muscle %:</strong> {{ $measurement->muscle_percentage }} %</p>
                    <p><strong>Water %:</strong> {{ $measurement->water_percentage ?? '-' }} %</p>
                    <p><strong>Bone Weight:</strong> {{ $measurement->bone_weight ?? '-' }} kg</p>
                    <p><strong>Notes:</strong> {{ $measurement->notes ?? '-' }}</p>

                    <div class="mt-4">
                        <a href="{{ route('measurements.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Back to list
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
