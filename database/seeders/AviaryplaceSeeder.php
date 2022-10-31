<?php

namespace Database\Seeders;

use App\Models\AviaryPlace;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AviaryPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AviaryPlace::factory(50)->create();
    }
}
