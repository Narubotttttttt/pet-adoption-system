<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            
            <div class="flex items-center gap-3 mb-8 border-b-2 border-[#199CA4] pb-4">
                <span class="text-2xl">🐾</span>
                <h1 class="text-xl font-bold text-gray-900">Add New Pet</h1>
            </div>

            @if(session('success'))
                <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-2">
                    <span>✅</span>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl">
                    <div class="flex items-center gap-2 mb-2 font-semibold">
                        <span>⚠️</span>
                        <span>Please fix the following errors:</span>
                    </div>
                    <ul class="list-disc pl-5 text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('pets._form')

                <div class="flex items-center gap-3 justify-end border-t border-gray-100 pt-6">
                    <a href="{{ route('dashboard') }}"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 border border-gray-200 hover:bg-gray-50 transition">Cancel</a>
                    <button type="submit"
                        class="px-6 py-2.5 bg-[#199CA4] text-white text-sm font-semibold rounded-xl hover:bg-[#13787F] shadow-md shadow-[#199CA4]/10 transition">Save Pet Profile</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>