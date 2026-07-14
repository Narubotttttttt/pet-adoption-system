<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $adminExists = User::where('role', 'admin')->exists();

        if (! auth()->check()) {
            if ($adminExists) {
                abort(403, 'Unauthorized');
            }

            return view('auth.register', [
                'pageTitle' => 'Create Admin Account',
                'pageSubtitle' => 'Set up the first admin account for the dashboard.',
                'showRoleSelect' => false,
                'registerRole' => 'admin',
            ]);
        }

        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return view('auth.register', [
            'pageTitle' => 'Create Staff Account',
            'pageSubtitle' => 'Add a new staff user for the dashboard.',
            'showRoleSelect' => false,
            'registerRole' => 'staff',
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $adminExists = User::where('role', 'admin')->exists();

        if (! auth()->check()) {
            if ($adminExists) {
                abort(403, 'Unauthorized');
            }
            $role = 'admin';
        } else {
            if (auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized');
            }
            $role = 'staff';
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        event(new Registered($user));

        return redirect(route('dashboard', absolute: false));
    }
}
