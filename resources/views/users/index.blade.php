<x-app-layout>
    <div class="min-h-screen bg-gray-50 flex flex-col lg:flex-row">
        <aside class="w-full lg:w-72 bg-white border-b lg:border-b-0 lg:border-r border-gray-200 shrink-0">
            <div class="px-6 py-8">
                <div class="flex items-center gap-3 mb-10">
                    <img src="{{ asset('images/caws-logo.jpg') }}" alt="CAWS Logo" class="w-10 h-10 rounded-xl object-cover border border-gray-200">
                    <div>
                        <h2 class="text-md font-bold text-gray-900 leading-tight">CDO Animal Welfare</h2>
                        <p class="text-xs text-gray-500 font-medium">Society Inc.</p>
                    </div>
                </div>

                <nav class="space-y-1.5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-[#199CA4]/5 hover:text-[#199CA4] transition-all">
                        <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 rounded-lg">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4v11a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>
                            </svg>
                        </span>
                        Dashboard
                    </a>
                    <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-[#199CA4]/10 text-[#199CA4] font-semibold transition-all">
                        <span class="inline-flex items-center justify-center w-8 h-8 bg-[#199CA4]/20 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.89 0 5.578.92 7.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 7v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a4 4 0 014-4h6a4 4 0 014 4z" />
                            </svg>
                        </span>
                        User Management
                    </a>
                </nav>
            </div>
        </aside>

        <main class="flex-1 p-6 lg:p-10 overflow-y-auto">
            <div class="max-w-7xl mx-auto space-y-8">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between pb-2">
                    <div>
                        <h1 class="text-2xl font-bold text-[#333634]">User Management</h1>
                        <p class="text-sm text-gray-500 mt-0.5">Manage admin and staff accounts.</p>
                    </div>
                    <div>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-xl bg-[#199CA4] px-4 py-3 text-sm font-semibold text-white hover:bg-[#157a86] transition-all">
                            Create User
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-50 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Created</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50/70 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($user->role) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
