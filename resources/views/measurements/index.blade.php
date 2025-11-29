<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Body Measurements
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-200 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('measurements.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 mb-4 inline-block">
                Add Measurement
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($measurements->isEmpty())
                        <p>No measurements found.</p>
                    @else
                        <table class="min-w-full table-auto border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 border">Date</th>
                                    <th class="px-4 py-2 border">Weight (kg)</th>
                                    <th class="px-4 py-2 border">Fat %</th>
                                    <th class="px-4 py-2 border">Muscle %</th>
                                    <th class="px-4 py-2 border">Water %</th>
                                    <th class="px-4 py-2 border">Bone Weight</th>
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($measurements as $m)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $m->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border">{{ $m->weight }}</td>
                                    <td class="px-4 py-2 border">{{ $m->fat_percentage }}</td>
                                    <td class="px-4 py-2 border">{{ $m->muscle_percentage }}</td>
                                    <td class="px-4 py-2 border">{{ $m->water_percentage ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $m->bone_weight ?? '-' }}</td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('measurements.show', $m) }}" class="text-blue-500 hover:underline">View</a>
                                        <form action="{{ route('measurements.destroy', $m) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $measurements->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
