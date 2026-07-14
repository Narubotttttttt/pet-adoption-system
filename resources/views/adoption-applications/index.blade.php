<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-[#333634]">Adoption Requests</h1>
                <p class="text-sm text-gray-500 mt-1">Review incoming applications and schedule meet-and-greets.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Pet</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Applicant</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Scheduled</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-gray-500 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($applications as $application)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $application->pet->name ?? '—' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $application->applicant_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst(str_replace('_', ' ', $application->status)) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $application->scheduled_at ? $application->scheduled_at->format('M d, Y H:i') : 'Not scheduled' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <a href="{{ route('adoption-applications.show', $application) }}" class="text-[#199CA4] hover:text-[#13787F] font-medium">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">No adoption applications yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-gray-100">
                {{ $applications->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
