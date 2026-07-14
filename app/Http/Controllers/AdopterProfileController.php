<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use Illuminate\View\View;

class AdopterProfileController extends Controller
{
    public function index(): View
    {
        $adopters = AdoptionApplication::with('pet')
            ->where('status', 'approved')
            ->latest('updated_at')
            ->paginate(10);

        return view('adopters.index', compact('adopters'));
    }
}
