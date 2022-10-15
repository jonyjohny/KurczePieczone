<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Test',
            'email' => 'admin@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        /*
        $adminRole = Role::findByName(config('app.admin_role'));
        if (isset($adminRole)) {
            $user->assignRole($adminRole);
        }
        */ 
        
        User::create([
            'name' => 'Kierownik Test',
            'email' => 'kierownik@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        /*
        $moderatorRole = Role::findByName(config('app.moderator_role'));
        if (isset($moderatorRole)) {
            $user->assignRole($moderatorRole);
        }
        */

        User::create([
            'name' => 'User Test',
            'email' => 'user@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        /*
        $moderatorRole = Role::findByName(config('app.moderator_role'));
        if (isset($moderatorRole)) {
            $user->assignRole($moderatorRole);
        }
        */

    }
}
