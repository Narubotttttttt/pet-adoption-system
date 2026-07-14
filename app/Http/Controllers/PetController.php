<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\AdoptionApplication;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function create()
    {
        return view('pets.create');
    }

    public function index()
    {
        // server-side search and pagination
        $q = request()->input('q');

        $query = Pet::query();

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('breed', 'like', "%{$q}%")
                    ->orWhere('color', 'like', "%{$q}%")
                    ->orWhere('type', 'like', "%{$q}%");
            });
        }

        $pets = $query->latest('created_at')->paginate(10)->withQueryString();

        return view('pets.index', [
            'pets' => $pets,
            'q' => $q,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'type' => 'required|in:dog,cat',
            'age' => 'nullable|string|max:50',
            'medical_history' => 'nullable|string',
            'temperament' => 'nullable|string',
            'photo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('pets', 'public');
        }

        Pet::create([
            'name' => $data['name'],
            'breed' => $data['breed'],
            'color' => $data['color'],
            'gender' => $data['gender'],
            'type' => $data['type'],
            'age' => $data['age'] ?? null,
            'medical_history' => $data['medical_history'] ?? null,
            'temperament' => $data['temperament'] ?? null,
            'photo_path' => $data['photo_path'] ?? null,
            'status' => 'available',
        ]);

        session()->flash('success', 'Pet added successfully.');

        return redirect()->route('dashboard');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', [
            'pet' => $pet,
        ]);
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', [
            'pet' => $pet,
        ]);
    }

    public function update(Request $request, Pet $pet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'type' => 'required|in:dog,cat',
            'age' => 'nullable|string|max:50',
            'medical_history' => 'nullable|string',
            'temperament' => 'nullable|string',
            'status' => ['required', 'in:available,pending,adopted'],
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($pet->photo_path && Storage::disk('public')->exists($pet->photo_path)) {
                Storage::disk('public')->delete($pet->photo_path);
            }

            $data['photo_path'] = $request->file('photo')->store('pets', 'public');
        }

        $pet->update([ 
            'name' => $data['name'],
            'breed' => $data['breed'],
            'color' => $data['color'],
            'gender' => $data['gender'],
            'type' => $data['type'],
            'age' => $data['age'] ?? null,
            'medical_history' => $data['medical_history'] ?? null,
            'temperament' => $data['temperament'] ?? null,
            'status' => $data['status'],
            'photo_path' => $data['photo_path'] ?? $pet->photo_path,
        ]);

        session()->flash('success', 'Pet updated successfully.');

        return redirect()->route('pets.index');
    }

    public function destroy(Pet $pet)
    {
        if ($pet->photo_path && Storage::disk('public')->exists($pet->photo_path)) {
            Storage::disk('public')->delete($pet->photo_path);
        }

        $pet->delete();

        session()->flash('success', 'Pet removed.');

        return redirect()->route('pets.index');
    }
}
