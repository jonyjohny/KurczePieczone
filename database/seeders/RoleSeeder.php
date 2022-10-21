<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $boss = Role::create(['name' => config('auth.roles.boss')]);
        $supervisor = Role::create(['name' => config('auth.roles.supervisor')]);
        $worker = Role::create(['name' => config('auth.roles.worker')]);
    }
}