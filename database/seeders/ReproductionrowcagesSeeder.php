<?php

namespace Database\Seeders;

use App\Models\Reproductionrowcages;
use Illuminate\Database\Seeder;

class ReproductionrowcagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reproductionrowcages::factory(2000)->create();
    }
}
