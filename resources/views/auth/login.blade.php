<x-guest-layout>
    <div class="min-h-screen bg-[#f8fafc] flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full text-center mb-8">
            <h2 class="text-3xl font-extrabold text-[#0f172a] tracking-tight">Admin Sign In</h2>
            <p class="mt-2 text-sm text-[#64748b]">Secure access for the admin dashboard only.</p>
        </div>

        <div class="max-w-md w-full bg-white border border-[#e2e8f0] rounded-3xl p-8 shadow-sm">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-[#94a3b8] mb-2">Email</label>
                    <input id="email" name="email" type="email" required value="{{ old('email') }}" autofocus autocomplete="username"
                        class="w-full px-4 py-3 bg-[#0f172a] text-white rounded-xl border border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-150" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-[#94a3b8] mb-2">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 bg-[#0f172a] text-white rounded-xl border border-transparent focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-150" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <div class="flex items-center justify-between pt-4">
                    <label for="remember_me" class="inline-flex items-center text-sm text-[#64748b]">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-500" name="remember">
                        <span class="ml-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-[#64748b] hover:text-teal-600 transition duration-150" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-3.5 rounded-xl shadow-md shadow-teal-600/20 active:scale-95 transition duration-150 w-full">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
