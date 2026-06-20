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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" 
                            placeholder="" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Breed</label>
                        <input type="text" name="breed" value="{{ old('breed') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" 
                            placeholder="" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Color</label>
                        <input type="text" name="color" value="{{ old('color') }}" 
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" 
                            placeholder="e.g., Brown" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Gender</label>
                        <select name="gender" 
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" required>
                            <option value="">Select gender</option>
                            <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Pet Type</label>
                        <select name="type" 
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" required>
                            <option value="">Select type</option>
                            <option value="dog" {{ old('type')=='dog' ? 'selected' : '' }}>Dog</option>
                            <option value="cat" {{ old('type')=='cat' ? 'selected' : '' }}>Cat</option>
                        </select>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Pet Photo</label>
                    <div class="relative border-2 border-dashed border-gray-200 hover:border-[#199CA4] rounded-2xl p-6 text-center transition bg-gray-50/50">
                        <span class="text-3xl block mb-2">📸</span>
                        <span class="text-sm text-gray-600 block font-medium mb-1">Choose a high-quality photo</span>
                        <input type="file" name="photo" accept="image/*" 
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#199CA4]/10 file:text-[#199CA4] hover:file:bg-[#199CA4]/20 file:transition cursor-pointer" required>
                    </div>
                </div>

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