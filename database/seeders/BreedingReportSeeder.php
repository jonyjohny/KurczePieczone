<?php

namespace Database\Seeders;

use App\Models\BreedingReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedingReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BreedingReport::factory(50)->create();

    }
}
