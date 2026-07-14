<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use App\Models\Pet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class AdoptionApplicationController extends Controller
{
    public function create(Pet $pet): View
    {
        return view('adoption-applications.create', compact('pet'));
    }

    public function store(Request $request, Pet $pet): RedirectResponse
    {
        $request->validate([
            'applicant_name' => ['required', 'string', 'max:255'],
            'applicant_email' => ['required', 'email', 'max:255'],
            'applicant_phone' => ['nullable', 'string', 'max:50'],
            'message' => ['nullable', 'string'],
        ]);

        AdoptionApplication::create([
            'pet_id' => $pet->id,
            'applicant_name' => $request->applicant_name,
            'applicant_email' => $request->applicant_email,
            'applicant_phone' => $request->applicant_phone,
            'message' => $request->message,
        ]);

        return redirect()->route('pets.show', $pet)->with('success', 'Adoption request submitted successfully.');
    }

    public function index(): View
    {
        $applications = AdoptionApplication::with('pet')->latest()->paginate(10);

        return view('adoption-applications.index', compact('applications'));
    }

    public function show(AdoptionApplication $application): View
    {
        return view('adoption-applications.show', compact('application'));
    }

    public function update(Request $request, AdoptionApplication $application): RedirectResponse
    {
        $request->validate([
            'status' => ['required', Rule::in(['under_review', 'approved', 'rejected'])],
            'scheduled_at' => ['nullable', 'date'],
        ]);

        $application->update($request->only(['status', 'scheduled_at']));

        return back()->with('success', 'Adoption application updated successfully.');
    }
}
