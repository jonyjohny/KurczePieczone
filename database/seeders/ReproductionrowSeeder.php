<?php

namespace Database\Seeders;

use App\Models\Reproductionrow;
use Illuminate\Database\Seeder;

class ReproductionrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reproductionrow::factory(200)->create();
    }
}
