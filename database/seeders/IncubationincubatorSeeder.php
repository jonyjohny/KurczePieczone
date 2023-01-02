<?php

namespace Database\Seeders;

use App\Models\Incubationincubator;
use Illuminate\Database\Seeder;

class IncubationincubatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incubationincubator::factory(200)->create();
    }
}
