<?php

namespace Database\Seeders;

use App\Models\ReproductionReport;
use Illuminate\Database\Seeder;

class ReproductionReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReproductionReport::factory(1000)->create();
    }
}
