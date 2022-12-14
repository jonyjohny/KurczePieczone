<?php

namespace Database\Seeders;

use App\Models\AviaryReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AviaryReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AviaryReport::factory(50)->create();
    }
}
