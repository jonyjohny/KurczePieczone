<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdatePasswordForm;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated()
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdatePasswordForm::class)
                ->set('state', [
                    'current_password' => 'password',
                    'password' => 'new-password',
                    'password_confirmation' => 'new-password',
                ])
                ->call('updatePassword');

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }

    public function test_current_password_must_be_correct()
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdatePasswordForm::class)
                ->set('state', [
                    'current_password' => 'wrong-password',
                    'password' => 'new-password',
                    'password_confirmation' => 'new-password',
                ])
                ->call('updatePassword')
                ->assertHasErrors(['current_password']);

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }

    public function test_new_passwords_must_match()
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdatePasswordForm::class)
                ->set('state', [
                    'current_password' => 'password',
                    'password' => 'new-password',
                    'password_confirmation' => 'wrong-password',
                ])
                ->call('updatePassword')
                ->assertHasErrors(['password']);

        $this->assertTrue(Hash::check('password', $user->fresh()->password));
    }
}
