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

        Permission::create(['name' => 'incubations.index']);
        Permission::create(['name' => 'incubations.store']);
        Permission::create(['name' => 'incubations.destroy']);
        Permission::create(['name' => 'incubations.closed']);
        Permission::create(['name' => 'incubations.archived']);

        Permission::create(['name' => 'breeding.index']);
        Permission::create(['name' => 'breeding.store']);
        Permission::create(['name' => 'breeding.destroy']);
        Permission::create(['name' => 'breeding.closed']);
        Permission::create(['name' => 'breeding.archived']);

        Permission::create(['name' => 'aviaries.index']);
        Permission::create(['name' => 'aviaries.store']);
        Permission::create(['name' => 'aviaries.destroy']);
        Permission::create(['name' => 'aviaries.closed']);
        Permission::create(['name' => 'aviaries.archived']);

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
        $adminRole->givePermissionTo('incubations.index');
        $adminRole->givePermissionTo('incubations.store');
        $adminRole->givePermissionTo('incubations.destroy');
        $adminRole->givePermissionTo('incubations.closed');
        $adminRole->givePermissionTo('incubations.archived');
        $adminRole->givePermissionTo('breeding.index');
        $adminRole->givePermissionTo('breeding.store');
        $adminRole->givePermissionTo('breeding.destroy');
        $adminRole->givePermissionTo('breeding.closed');
        $adminRole->givePermissionTo('breeding.archived');
        $adminRole->givePermissionTo('aviaries.index');
        $adminRole->givePermissionTo('aviaries.store');
        $adminRole->givePermissionTo('aviaries.destroy');
        $adminRole->givePermissionTo('aviaries.closed');
        $adminRole->givePermissionTo('aviaries.archived');

        $bossRole = Role::findByName(config('auth.roles.boss'));
        $bossRole->givePermissionTo('users.index');
        $bossRole->givePermissionTo('users.store');
        $bossRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.closed');
        $adminRole->givePermissionTo('reproductions.archived');
        $adminRole->givePermissionTo('incubations.index');
        $adminRole->givePermissionTo('incubations.store');
        $adminRole->givePermissionTo('incubations.closed');
        $adminRole->givePermissionTo('incubations.archived');
        $adminRole->givePermissionTo('breeding.index');
        $adminRole->givePermissionTo('breeding.store');
        $adminRole->givePermissionTo('breeding.closed');
        $adminRole->givePermissionTo('breeding.archived');
        $adminRole->givePermissionTo('aviaries.index');
        $adminRole->givePermissionTo('aviaries.store');
        $adminRole->givePermissionTo('aviaries.closed');
        $adminRole->givePermissionTo('aviaries.archived');

        $supervisorRole = Role::findByName(config('auth.roles.supervisor'));
        $supervisorRole->givePermissionTo('users.index');
        $supervisorRole->givePermissionTo('users.store');
        $supervisorRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.closed');
        $adminRole->givePermissionTo('reproductions.archived');
        $adminRole->givePermissionTo('incubations.index');
        $adminRole->givePermissionTo('incubations.store');
        $adminRole->givePermissionTo('incubations.closed');
        $adminRole->givePermissionTo('incubations.archived');
        $adminRole->givePermissionTo('breeding.index');
        $adminRole->givePermissionTo('breeding.store');
        $adminRole->givePermissionTo('breeding.closed');
        $adminRole->givePermissionTo('breeding.archived');
        $adminRole->givePermissionTo('aviaries.index');
        $adminRole->givePermissionTo('aviaries.store');
        $adminRole->givePermissionTo('aviaries.closed');
        $adminRole->givePermissionTo('aviaries.archived');

        $supervisorRole = Role::findByName(config('auth.roles.worker'));
        $adminRole->givePermissionTo('reproductions.index');
        $adminRole->givePermissionTo('reproductions.store');
        $adminRole->givePermissionTo('reproductions.archived');
        $adminRole->givePermissionTo('incubations.index');
        $adminRole->givePermissionTo('incubations.store');
        $adminRole->givePermissionTo('incubations.archived');
        $adminRole->givePermissionTo('breeding.index');
        $adminRole->givePermissionTo('breeding.store');
        $adminRole->givePermissionTo('breeding.archived');
        $adminRole->givePermissionTo('aviaries.index');
        $adminRole->givePermissionTo('aviaries.store');
        $adminRole->givePermissionTo('aviaries.archived');
    }
}
