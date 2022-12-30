<?php

namespace Database\Seeders;

use App\Models\Reproduction;
use Illuminate\Database\Seeder;

class ReproductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reproduction::factory(20)->create();
    }
}
