<?php

namespace Database\Seeders;

use App\Models\ReproductionReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ReproductionReport::factory(10000)->create();
    }
}
