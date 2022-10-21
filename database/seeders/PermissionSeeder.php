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
        Permission::create(['name' => 'log-viewer']);

        
        Permission::create(['name' => 'reproductions.index']);
        Permission::create(['name' => 'reproductions.store']);
        Permission::create(['name' => 'reproductions.destroy']);
        Permission::create(['name' => 'reproductions.closed']);
        Permission::create(['name' => 'reproductions.archived']);

        $adminRole = Role::findByName(config('auth.roles.admin'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.store');
        $adminRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('users.change_role');
        $adminRole->givePermissionTo('log-viewer');
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.destroy');
        $adminRole->givePermissionTo('reproductions.closed');
        $adminRole->givePermissionTo('reproductions.archived');

        $bossRole = Role::findByName(config('auth.roles.boss'));
        $bossRole->givePermissionTo('users.index');
        $bossRole->givePermissionTo('users.store');
        $bossRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.closed');
        $adminRole->givePermissionTo('reproductions.archived');

        $supervisorRole = Role::findByName(config('auth.roles.supervisor'));
        $supervisorRole->givePermissionTo('users.index');
        $supervisorRole->givePermissionTo('users.store');
        $supervisorRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.closed');
        $adminRole->givePermissionTo('reproductions.archived');

        $supervisorRole = Role::findByName(config('auth.roles.worker'));
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.archived');
    }
}
