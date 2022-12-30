<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PermisionTest extends TestCase
{
    use DatabaseTransactions;

    public function test_access_without_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response = $this->get('/dashboard');
        $response->assertStatus(302);

        $response = $this->get('/reproductions');
        $response->assertStatus(403);
        $response = $this->get('/reproductionrows/1');
        $response->assertStatus(403);
        $response = $this->get('/reproductionrowcages/1');
        $response->assertStatus(403);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(403);

        $response = $this->get('/incubations');
        $response->assertStatus(403);
        $response = $this->get('/incubationincubators/1');
        $response->assertStatus(403);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(403);

        $response = $this->get('/breeding');
        $response->assertStatus(403);
        $response = $this->get('/breedingplaces/1');
        $response->assertStatus(403);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(403);

        $response = $this->get('/aviaries');
        $response->assertStatus(403);
        $response = $this->get('/aviaryplaces/1');
        $response->assertStatus(403);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(403);

        $response = $this->get('/users');
        $response->assertStatus(403);
    }

    public function test_access_with_login_admin()
    {
        $user = User::where('email', '=', 'admin@localhost')->first();
        $this->actingAs($user);

        $response = $this->get('/login');
        $response->assertStatus(302);
        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        $response = $this->get('/reproductions');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrows/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrowcages/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/incubations');
        $response->assertStatus(200);
        $response = $this->get('/incubationincubators/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/breeding');
        $response->assertStatus(200);
        $response = $this->get('/breedingplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/aviaries');
        $response->assertStatus(200);
        $response = $this->get('/aviaryplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function test_access_with_login_boss()
    {
        $user = User::where('email', '=', 'boss@localhost')->first();
        $this->actingAs($user);

        $response = $this->get('/login');
        $response->assertStatus(302);
        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        $response = $this->get('/reproductions');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrows/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrowcages/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/incubations');
        $response->assertStatus(200);
        $response = $this->get('/incubationincubators/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/breeding');
        $response->assertStatus(200);
        $response = $this->get('/breedingplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/aviaries');
        $response->assertStatus(200);
        $response = $this->get('/aviaryplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function test_access_with_login_supervisor()
    {
        $user = User::where('email', '=', 'supervisor@localhost')->first();
        $this->actingAs($user);

        $response = $this->get('/login');
        $response->assertStatus(302);
        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        $response = $this->get('/reproductions');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrows/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrowcages/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/incubations');
        $response->assertStatus(200);
        $response = $this->get('/incubationincubators/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/breeding');
        $response->assertStatus(200);
        $response = $this->get('/breedingplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/aviaries');
        $response->assertStatus(200);
        $response = $this->get('/aviaryplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function test_access_with_login_user_worker()
    {
        $user = User::where('email', '=', 'worker@localhost')->first();
        $this->actingAs($user);

        $response = $this->get('/login');
        $response->assertStatus(302);
        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        $response = $this->get('/reproductions');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrows/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionrowcages/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/incubations');
        $response->assertStatus(200);
        $response = $this->get('/incubationincubators/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/breeding');
        $response->assertStatus(200);
        $response = $this->get('/breedingplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/incubationreport/1');
        $response->assertStatus(200);

        $response = $this->get('/aviaries');
        $response->assertStatus(200);
        $response = $this->get('/aviaryplaces/1');
        $response->assertStatus(200);
        $response = $this->get('/reproductionreport/1');
        $response->assertStatus(200);

        $response = $this->get('/users');
        $response->assertStatus(403);
    }
}
