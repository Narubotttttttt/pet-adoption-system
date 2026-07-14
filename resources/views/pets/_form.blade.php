@php $pet = $pet ?? null; @endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', optional($pet)->name) }}"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800"
            required>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Breed</label>
        <input type="text" name="breed" value="{{ old('breed', optional($pet)->breed) }}"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800"
            required>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Color</label>
        <input type="text" name="color" value="{{ old('color', optional($pet)->color) }}"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800"
            placeholder="e.g., Brown" required>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Gender</label>
        <select name="gender"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" required>
            <option value="">Select gender</option>
            <option value="male" {{ old('gender', optional($pet)->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', optional($pet)->gender) == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Pet Type</label>
        <select name="type"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" required>
            <option value="">Select type</option>
            <option value="dog" {{ old('type', optional($pet)->type) == 'dog' ? 'selected' : '' }}>Dog</option>
            <option value="cat" {{ old('type', optional($pet)->type) == 'cat' ? 'selected' : '' }}>Cat</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Age</label>
        <input type="text" name="age" value="{{ old('age', optional($pet)->age) }}"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800"
            placeholder="e.g., 2 years">
    </div>

    <div>
        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Status</label>
        <select name="status"
            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800" required>
            <option value="available" {{ old('status', optional($pet)->status ?? 'available') == 'available' ? 'selected' : '' }}>Available</option>
            <option value="pending" {{ old('status', optional($pet)->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="adopted" {{ old('status', optional($pet)->status) == 'adopted' ? 'selected' : '' }}>Adopted</option>
        </select>
    </div>
</div>

<div class="mb-8">
    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Medical Background</label>
    <textarea name="medical_history" rows="4"
        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800">{{ old('medical_history', optional($pet)->medical_history) }}</textarea>
</div>

<div class="mb-8">
    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Temperament</label>
    <textarea name="temperament" rows="4"
        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#199CA4] focus:ring-4 focus:ring-[#199CA4]/10 transition outline-none shadow-sm text-gray-800">{{ old('temperament', optional($pet)->temperament) }}</textarea>
</div>

<div class="mb-8">
    <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Pet Photo</label>
    <div class="relative border-2 border-dashed border-gray-200 hover:border-[#199CA4] rounded-2xl p-6 text-center transition bg-gray-50/50">
        <span class="text-3xl block mb-2">📸</span>
        <span class="text-sm text-gray-600 block font-medium mb-1">Choose a high-quality photo</span>
        <input type="file" name="photo" accept="image/*"
            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-[#199CA4]/10 file:text-[#199CA4] hover:file:bg-[#199CA4]/20 file:transition cursor-pointer">
    </div>
    @if(optional($pet)->photo_path)
        <p class="text-xs text-gray-500 mt-2">Current photo:</p>
        <div class="w-28 h-28 mt-2 rounded-xl overflow-hidden border">
            <img src="{{ asset('storage/'.optional($pet)->photo_path) }}" class="w-full h-full object-cover">
        </div>
    @endif
</div>
