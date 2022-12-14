<?php

namespace Database\Seeders;

use App\Models\Reproductionrow;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
