<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
