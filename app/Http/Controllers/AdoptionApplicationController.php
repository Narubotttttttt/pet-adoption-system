<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class AdoptionApplicationController extends Controller
{
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
