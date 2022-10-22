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
        $bossRole->givePermissionTo('reproductions.index');
        $bossRole->givePermissionTo('reproductions.store');
        $bossRole->givePermissionTo('reproductions.closed');
        $bossRole->givePermissionTo('reproductions.archived');
        $bossRole->givePermissionTo('incubations.index');
        $bossRole->givePermissionTo('incubations.store');
        $bossRole->givePermissionTo('incubations.closed');
        $bossRole->givePermissionTo('incubations.archived');
        $bossRole->givePermissionTo('breeding.index');
        $bossRole->givePermissionTo('breeding.store');
        $bossRole->givePermissionTo('breeding.closed');
        $bossRole->givePermissionTo('breeding.archived');
        $bossRole->givePermissionTo('aviaries.index');
        $bossRole->givePermissionTo('aviaries.store');
        $bossRole->givePermissionTo('aviaries.closed');
        $bossRole->givePermissionTo('aviaries.archived');

        $supervisorRole = Role::findByName(config('auth.roles.supervisor'));
        $supervisorRole->givePermissionTo('users.index');
        $supervisorRole->givePermissionTo('users.store');
        $supervisorRole->givePermissionTo('users.destroy');
        $supervisorRole->givePermissionTo('reproductions.index');
        $supervisorRole->givePermissionTo('reproductions.store');
        $supervisorRole->givePermissionTo('reproductions.closed');
        $supervisorRole->givePermissionTo('reproductions.archived');
        $supervisorRole->givePermissionTo('incubations.index');
        $supervisorRole->givePermissionTo('incubations.store');
        $supervisorRole->givePermissionTo('incubations.closed');
        $supervisorRole->givePermissionTo('incubations.archived');
        $supervisorRole->givePermissionTo('breeding.index');
        $supervisorRole->givePermissionTo('breeding.store');
        $supervisorRole->givePermissionTo('breeding.closed');
        $supervisorRole->givePermissionTo('breeding.archived');
        $supervisorRole->givePermissionTo('aviaries.index');
        $supervisorRole->givePermissionTo('aviaries.store');
        $supervisorRole->givePermissionTo('aviaries.closed');
        $supervisorRole->givePermissionTo('aviaries.archived');

        $workerRole = Role::findByName(config('auth.roles.worker'));
        $workerRole->givePermissionTo('reproductions.index');
        $workerRole->givePermissionTo('reproductions.store');
        $workerRole->givePermissionTo('reproductions.archived');
        $workerRole->givePermissionTo('incubations.index');
        $workerRole->givePermissionTo('incubations.store');
        $workerRole->givePermissionTo('incubations.archived');
        $workerRole->givePermissionTo('breeding.index');
        $workerRole->givePermissionTo('breeding.store');
        $workerRole->givePermissionTo('breeding.archived');
        $workerRole->givePermissionTo('aviaries.index');
        $workerRole->givePermissionTo('aviaries.store');
        $workerRole->givePermissionTo('aviaries.archived');
    }
}
