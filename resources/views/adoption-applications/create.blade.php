<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-[#333634]">Adopt {{ $pet->name }}</h1>
                <p class="text-sm text-gray-500 mt-1">Submit your adoption request and our team will review it.</p>
            </div>
            <a href="{{ route('pets.show', $pet) }}" class="inline-flex items-center rounded-xl border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">Back to pet</a>
        </div>

        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="md:col-span-1">
                    <div class="rounded-3xl border border-gray-100 bg-gray-50 p-4 h-full">
                        <p class="text-xs uppercase tracking-wider text-gray-500 mb-2">Pet details</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $pet->name }}</p>
                        <p class="text-sm text-gray-600">{{ ucfirst($pet->type) }} • {{ $pet->breed }}</p>
                        <p class="mt-4 text-sm text-gray-500">Please share a short message describing why you'd be a great home.</p>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <form action="{{ route('adoption-applications.store', $pet) }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Full name</label>
                            <input type="text" name="applicant_name" value="{{ old('applicant_name', Auth::user()->name ?? '') }}"
                                class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-800 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 outline-none" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Email</label>
                                <input type="email" name="applicant_email" value="{{ old('applicant_email', Auth::user()->email ?? '') }}"
                                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-800 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Phone</label>
                                <input type="text" name="applicant_phone" value="{{ old('applicant_phone') }}"
                                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-800 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Message</label>
                            <textarea name="message" rows="6"
                                class="w-full rounded-3xl border border-gray-200 px-4 py-3 text-sm text-gray-800 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 outline-none">{{ old('message') }}</textarea>
                        </div>

                        <div class="flex justify-end gap-3">
                            <button type="submit" class="rounded-2xl bg-[#199CA4] px-5 py-3 text-sm font-semibold text-white hover:bg-[#13787F] transition">Submit request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
