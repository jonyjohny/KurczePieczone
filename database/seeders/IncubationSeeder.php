<?php

namespace Database\Seeders;

use App\Models\Incubation;
use Illuminate\Database\Seeder;

class IncubationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incubation::factory(20)->create();
    }
}
