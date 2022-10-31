<?php

namespace Database\Seeders;

use App\Models\Breedingplace;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BreedingplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Breedingplace::factory(50)->create();
    }
}
