<?php

namespace Database\Seeders;

use App\Models\AviaryPlace;
use Illuminate\Database\Seeder;

class AviaryPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AviaryPlace::factory(200)->create();
    }
}
