<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //criando permissoes

        $permissions = [
            'create-user',
            'create-appointment',
            'admin-create-appointment',
            'create-pet',
            'admin-create-pet',
            'create-admin',
            'edit-pet',
            'edit-user',
            'edit-appointment',
            'edit-admin',
            'delete-pet',
            'delete-appointment',
            'delete-admin',
            'view-appointments',
            'view-pets',
            'user-page',
            'admin-page',
            'admin-dashboard',
            'calendar',
            'admin-calendar',
        ];

        foreach ($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        Role::create(['name' => 'Super Admin']);

        $role = Role::create(['name' => 'user']);

        //atribuindo permissoes de usuarios

        $userPermissions = [
            'create-pet',
            'edit-pet',
            'delete-pet',
            'view-pets',
            'create-appointment',
            'delete-appointment',
            'view-appointments',
            'user-page',
            'calendar',
        ];

        foreach ($userPermissions as $permission){
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'admin']);

        //atribuindo permissoes de admin

        $adminPermissions = [
            'create-user',
            'admin-create-appointment',
            'create-appointment',
            'admin-create-pet',
            'create-pet',
            'create-admin',
            'edit-pet',
            'edit-user',
            'edit-appointment',
            'delete-pet',
            'delete-appointment',
            'view-appointments',
            'view-pets',
            'admin-page',
            'admin-dashboard',
            'admin-calendar',
        ];

        foreach ($adminPermissions as $permission){
            $role->givePermissionTo($permission);
        }
    }
}
