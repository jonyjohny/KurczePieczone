<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm;

class BrowserSessionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_other_browser_sessions_can_be_logged_out()
    {
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
        $this->actingAs($user = User::factory()->create());

        Livewire::test(LogoutOtherBrowserSessionsForm::class)
                ->set('password', 'password')
                ->call('logoutOtherBrowserSessions')
                ->assertSuccessful();
    }
}
