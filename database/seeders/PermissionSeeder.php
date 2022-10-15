<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.change_role']);

        $adminRole = Role::findByName(config('auth.roles.admin'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.store');
        $adminRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('users.change_role');

        $bossRole = Role::findByName(config('auth.roles.boss'));
        $bossRole->givePermissionTo('users.index');
        $bossRole->givePermissionTo('users.store');
        $bossRole->givePermissionTo('users.destroy');

        $supervisorRole = Role::findByName(config('auth.roles.supervisor'));
        $supervisorRole->givePermissionTo('users.index');
        $supervisorRole->givePermissionTo('users.store');
        $supervisorRole->givePermissionTo('users.destroy');
    }
}
