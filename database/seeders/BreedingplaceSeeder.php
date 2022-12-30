<?php

namespace Database\Seeders;

use App\Models\Breedingplace;
use Illuminate\Database\Seeder;

class BreedingplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Breedingplace::factory(200)->create();
    }
}
