<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_staff_account(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post('/register', [
            'name' => 'Staff Member',
            'email' => 'staff@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'staff',
        ]);

        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertDatabaseHas('users', [
            'email' => 'staff@example.com',
            'role' => 'staff',
        ]);
        $this->assertAuthenticatedAs($admin);
    }

    public function test_non_admin_cannot_access_registration(): void
    {
        $user = User::factory()->create(['role' => 'staff']);

        $response = $this->actingAs($user)->get('/register');

        $response->assertStatus(403);
    }
}
