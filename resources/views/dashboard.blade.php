<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="lg:flex lg:space-x-6">
            <!-- Sidebar -->
            <aside class="w-full lg:w-72 bg-white border-r border-gray-200">
                <div class="px-6 py-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold">A</div>
                        <div>
                            <p class="text-sm text-gray-500">Admin Panel</p>
                            <h2 class="text-xl font-semibold text-gray-900">Pet Adoption</h2>
                        </div>
                    </div>

                    <nav class="mt-10 space-y-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-50 text-blue-700 font-medium">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 rounded-lg">
                                <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l9-4 9 4v11a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>
                                </svg>
                            </span>
                            Dashboard
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </span>
                            Pets
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"></path>
                                </svg>
                            </span>
                            Adoptions
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-50 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 10-8 0v4M5 11h14v10H5V11z"></path>
                                </svg>
                            </span>
                            Users
                        </a>
                    </nav>
                </div>
            </aside>

            <main class="flex-1 px-4 py-8 lg:px-0 lg:py-10">
                <div class="max-w-7xl mx-auto">
                    <!-- Header -->
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-8">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
                            <p class="text-sm text-gray-500">Welcome, {{ Auth::user()->name }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition">New Pet</button>
                            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition">Reports</button>
                        </div>
                    </div>

                    <!-- Top Stats Row -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Pets Stat -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Pets</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                            <p class="text-xs text-gray-500 mt-2">Active in system</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Adoptions Stat -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Adoptions</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                            <p class="text-xs text-gray-500 mt-2">This month</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Users Stat -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">2</p>
                            <p class="text-xs text-gray-500 mt-2">Admin accounts</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20H1v-2a6 6 0 016-6v0"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Growth Stat -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg shadow p-6 text-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">Growth</p>
                            <p class="text-3xl font-bold mt-2">100%</p>
                            <p class="text-xs text-blue-100 mt-2">Year over year</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Analytics Chart (spans 2 cols) -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Adoption Trends</h2>
                    <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500">Chart visualization placeholder</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="#" class="block w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition font-medium text-sm">
                            + Add New Pet
                        </a>
                        <a href="#" class="block w-full px-4 py-3 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition font-medium text-sm">
                            View Adoptions
                        </a>
                        <a href="#" class="block w-full px-4 py-3 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition font-medium text-sm">
                            Manage Users
                        </a>
                        <a href="#" class="block w-full px-4 py-3 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition font-medium text-sm">
                            Reports
                        </a>
                    </div>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Recent Adoptions</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Pet Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Adopter</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-200 rounded-full"></div>
                                        No Data
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">—</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">—</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">—</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">Pending</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
