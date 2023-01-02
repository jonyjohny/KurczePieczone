<?php

namespace Database\Seeders;

use App\Models\Breeding;
use Illuminate\Database\Seeder;

class BreedingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Breeding::factory(20)->create();
    }
}
