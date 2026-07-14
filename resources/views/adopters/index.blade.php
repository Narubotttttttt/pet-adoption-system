<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-[#333634]">Adopters</h1>
                <p class="text-sm text-gray-500 mt-1">Approved adopters and their matched pets.</p>
            </div>
            <a href="{{ route('adoption-applications.index') }}" class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-gray-200 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">Review requests</a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Adopter</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Pet</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Updated</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($adopters as $adopter)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $adopter->applicant_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $adopter->pet->name ?? '—' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst(str_replace('_', ' ', $adopter->status)) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $adopter->updated_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <a href="{{ route('adoption-applications.show', $adopter) }}" class="text-[#199CA4] hover:text-[#13787F] font-medium">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">No approved adopters yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-gray-100">
                {{ $adopters->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
