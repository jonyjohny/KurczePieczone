<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $this->call(ReproductionrowSeeder::class);
        $this->call(IncubationincubatorSeeder::class);
        $this->call(BreedingplaceSeeder::class);
        $this->call(AviaryPlaceSeeder::class);
        $this->call(ReproductionrowcagesSeeder::class);
        $this->call(ReproductionReportSeeder::class);
        $this->call(IncubationReportSeeder::class);
        $this->call(BreedingReportSeeder::class);
        $this->call(AviaryReportSeeder::class);
    }
}
