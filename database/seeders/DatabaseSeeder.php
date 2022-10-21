<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Reproduction;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AviarySeeder;
use Database\Seeders\BreedingSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\IncubationSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ReproductionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);

        \App\Models\User::factory(15)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@localhost',
            'password' => Hash::make('testtest'),
        ]);

        $this->call(ReproductionSeeder::class);
        $this->call(IncubationSeeder::class);
        $this->call(BreedingSeeder::class);
        $this->call(AviarySeeder::class);
    }
}
