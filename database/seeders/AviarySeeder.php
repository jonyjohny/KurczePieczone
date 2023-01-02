<?php

namespace Database\Seeders;

use App\Models\Aviary;
use Illuminate\Database\Seeder;

class AviarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aviary::factory(20)->create();
    }
}
