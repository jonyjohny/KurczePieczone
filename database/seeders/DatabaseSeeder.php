<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@localhost',
             'password' => Hash::make('testtest'),
         ]);

        $this->call(UserSeeder::class);

        \App\Models\User::factory(15)->create();
    }
}
