<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incubationincubator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IncubationincubatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incubationincubator::factory(50)->create();
    }
}
