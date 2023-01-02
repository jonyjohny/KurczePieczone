<?php

namespace Tests\Unit;

use App\Models\Aviary;
use App\Models\Breeding;
use App\Models\Incubation;
use App\Models\Reproduction;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AddTest extends TestCase
{
    use DatabaseTransactions;

    public function test_add_reproduction_herd()
    {
        $user = User::where('email', '=', 'admin@localhost')->first();
        $this->actingAs($user);

        $tmp = Reproduction::where('name', '=', 'testrep')->first();

        if ($tmp != null) {
            $tmp = Reproduction::where('name', '=', 'testrep')->delete();
        }

        $response = $this->post('/reproductions/create/', [
            'name' => 'testrep',
            'remarks' => 'test',
            'closed' => 0,
            'archived' => 0,
        ]);

        $tmp = Reproduction::where('name', '=', 'testrep')->get();

        $this->assertTrue($tmp != null);
    }

    public function test_add_incubations()
    {
        $user = User::where('email', '=', 'admin@localhost')->first();
        $this->actingAs($user);

        $tmp = Incubation::where('name', '=', 'testinc')->first();

        if ($tmp != null) {
            $tmp = Incubation::where('name', '=', 'testinc')->delete();
        }

        $response = $this->post('/incubations/create/', [
            'name' => 'testinc',
            'remarks' => 'test',
            'closed' => 0,
            'archived' => 0,
        ]);

        $tmp = Incubation::where('name', '=', 'testinc')->get();

        $this->assertTrue($tmp != null);
    }

    public function test_add_breeding_place()
    {
        $user = User::where('email', '=', 'admin@localhost')->first();
        $this->actingAs($user);

        $tmp = Breeding::where('name', '=', 'testbre')->first();

        if ($tmp != null) {
            $tmp = Breeding::where('name', '=', 'tetestbrest')->delete();
        }

        $response = $this->post('/breeding/create/', [
            'name' => 'testbre',
            'remarks' => 'test',
            'closed' => 0,
            'archived' => 0,
        ]);

        $tmp = Breeding::where('name', '=', 'testbre')->get();

        $this->assertTrue($tmp != null);
    }

    public function test_add_aviary_place()
    {
        $user = User::where('email', '=', 'admin@localhost')->first();
        $this->actingAs($user);

        $tmp = Aviary::where('name', '=', 'testav')->first();

        if ($tmp != null) {
            $tmp = Aviary::where('name', '=', 'testav')->delete();
        }

        $response = $this->post('/aviaries/create/', [
            'name' => 'testav',
            'remarks' => 'test',
            'closed' => 0,
            'archived' => 0,
        ]);

        $tmp = Aviary::where('name', '=', 'testav')->get();

        $this->assertTrue($tmp != null);
    }
}
