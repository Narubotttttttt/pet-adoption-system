<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        if (! $user || $user->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $users = User::whereIn('role', ['admin', 'staff'])
            ->orderByRaw("FIELD(role, 'admin', 'staff')")
            ->orderBy('name')
            ->get();

        return view('users.index', compact('users'));
    }
}
