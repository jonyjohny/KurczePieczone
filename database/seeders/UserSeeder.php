<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        $adminRole = Role::findByName(config('auth.roles.admin'));
        if (isset($adminRole)) {
            $admin->assignRole($adminRole);
        }

        $boss = User::create([
            'name' => 'Boss Test',
            'email' => 'boss@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        $bossRole = Role::findByName(config('auth.roles.boss'));
        if (isset($bossRole)) {
            $boss->assignRole($bossRole);
        }

        $supervisor = User::create([
            'name' => 'Supervisor Test',
            'email' => 'supervisor@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        $supervisorRole = Role::findByName(config('auth.roles.supervisor'));
        if (isset($supervisorRole)) {
            $supervisor->assignRole($supervisorRole);
        }

        $worker = User::create([
            'name' => 'Worker Test',
            'email' => 'worker@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('testtest'),
        ]);

        $workerRole = Role::findByName(config('auth.roles.worker'));
        if (isset($workerRole)) {
            $worker->assignRole($workerRole);
        }
    }
}
