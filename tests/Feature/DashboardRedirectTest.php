<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_registration_redirects_to_a_rendering_dashboard(): void
    {
        $response = $this->post('/register', [
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('student.dashboard'));
        $user = User::where('email', 'student@example.com')->firstOrFail();
        $this->assertAuthenticatedAs($user);

        $this->actingAs($user)
            ->get(route('student.dashboard'))
            ->assertOk()
            ->assertViewIs('student.dashboard');
    }

    public function test_student_login_redirects_to_the_student_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'student',
            'password' => 'achrafachraf',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'achrafachraf',
        ])->assertRedirect(route('student.dashboard'));

        $this->get(route('student.dashboard'))
            ->assertOk()
            ->assertViewIs('student.dashboard');
    }

    public function test_admin_dashboard_uses_the_expected_uri_and_role_middleware(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertOk()
            ->assertViewIs('admin.dashboard');
    }
}
