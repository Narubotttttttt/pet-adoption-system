<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold">{{ $pet->name }}</h1>
                    <p class="text-sm text-gray-500">{{ ucfirst($pet->type ?? 'Unknown') }} • {{ $pet->breed ?? '—' }}</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('pets.edit', $pet) }}" class="px-4 py-2 bg-[#199CA4] text-white rounded-xl text-sm">Edit</a>
                    <a href="{{ route('pets.index') }}" class="px-4 py-2 border rounded-xl text-sm">Back</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <div class="w-full h-64 bg-gray-50 rounded-xl overflow-hidden flex items-center justify-center border border-gray-100">
                        @if($pet->photo_path)
                            <img src="{{ asset('storage/'.$pet->photo_path) }}" alt="{{ $pet->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-5xl">🐾</span>
                        @endif
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="space-y-3">
                        <p><strong class="text-gray-700">Breed:</strong> <span class="text-gray-600">{{ $pet->breed ?? '—' }}</span></p>
                        <p><strong class="text-gray-700">Color:</strong> <span class="text-gray-600">{{ $pet->color ?? '—' }}</span></p>
                        <p><strong class="text-gray-700">Gender:</strong> <span class="text-gray-600">{{ ucfirst($pet->gender ?? '—') }}</span></p>
                        <p><strong class="text-gray-700">Added:</strong> <span class="text-gray-600">{{ $pet->created_at->diffForHumans() }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
