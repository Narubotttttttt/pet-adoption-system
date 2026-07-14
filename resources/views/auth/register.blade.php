<x-guest-layout>
    <div class="min-h-screen bg-[#f8fafc] flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="max-w-md w-full text-center mb-8">
            <h2 class="text-3xl font-extrabold text-[#0f172a] tracking-tight">
                {{ $pageTitle ?? 'Create Staff Account' }}
            </h2>
            <p class="mt-2 text-sm text-[#64748b]">
                {{ $pageSubtitle ?? 'Add a new staff user for the dashboard.' }}
            </p>
        </div>

        <!-- Main Card Container -->
        <div class="max-w-md w-full bg-white border border-[#e2e8f0] rounded-3xl p-8 shadow-sm">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <input type="hidden" name="role" value="{{ $registerRole ?? 'staff' }}" />

                <!-- Account Type Badge Section -->
                <div class="bg-[#f8fafc] border border-[#f1f5f9] rounded-2xl p-4 flex items-center justify-between">
                    <div>
                        <span class="block text-[11px] font-bold tracking-wider text-[#94a3b8] uppercase">Account Type</span>
                        <span class="text-lg font-bold text-[#0f172a]">{{ ucfirst($registerRole ?? 'staff') }}</span>
                    </div>
                    <div class="bg-[#e0f2fe] text-[#0369a1] text-xs font-semibold px-3 py-1.5 rounded-xl">
                        {{ $registerRole === 'admin' ? 'Admin account' : 'Staff account' }}
                    </div>
                </div>

                <!-- Full Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-[#94a3b8] mb-2">Full Name</label>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                        class="w-full px-4 py-3 bg-[#0f172a] text-white rounded-xl border border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-150">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Email Address Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-[#94a3b8] mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}"
                        class="w-full px-4 py-3 bg-[#0f172a] text-white rounded-xl border border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-150">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Password Fields Row -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-[#94a3b8] mb-2">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-3 bg-[#0f172a] text-white rounded-xl border border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-150">
                        @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-[#94a3b8] mb-2">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="w-full px-4 py-3 bg-[#0f172a] text-white rounded-xl border border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-150">
                    </div>
                </div>

                <!-- Bottom Actions Section -->
                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-[#64748b] hover:text-teal-600 transition duration-150">
                        Already registered? Sign in
                    </a>

                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-3.5 rounded-xl shadow-md shadow-teal-600/20 active:scale-95 transition duration-150">
                        Create Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
