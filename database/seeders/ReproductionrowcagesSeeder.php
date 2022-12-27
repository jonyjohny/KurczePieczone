<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reproductionrowcages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReproductionrowcagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reproductionrowcages::factory(1000)->create();
    }
}
