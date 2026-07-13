<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function create()
    {
        return view('pets.create');
    }

    public function index()
    {
        $pets = Pet::latest('created_at')->get();

        return view('pets.index', [
            'pets' => $pets,
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
            'photo' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('pets', 'public');
        }

        // Save to database
        Pet::create([
            'name' => $data['name'],
            'breed' => $data['breed'],
            'color' => $data['color'],
            'gender' => $data['gender'],
            'type' => $data['type'],
            'photo_path' => $data['photo_path'] ?? null,
        ]);

        session()->flash('success', 'Pet added successfully.');

        return redirect()->route('dashboard');
    }
}
