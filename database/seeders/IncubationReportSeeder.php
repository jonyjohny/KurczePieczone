<?php

namespace Database\Seeders;

use App\Models\IncubationReport;
use Illuminate\Database\Seeder;

class IncubationReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncubationReport::factory(1000)->create();
    }
}
