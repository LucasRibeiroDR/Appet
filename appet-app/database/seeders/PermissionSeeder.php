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
            'admin-page',

            'admin-create-user',
            'admin-edit-user',
            'admin-delete-user',
            'admin-view-user',

            'admin-create-appointment',
            'admin-edit-appointment',
            'admin-delete-appointment',
            'admin-view-appointment',

            'admin-create-pet',
            'admin-edit-pet',
            'admin-delete-pet',
            'admin-view-pet',
            
            'admin-create-admin',
            'admin-edit-admin',
            'admin-delete-admin',
            'admin-view-admin',

            'admin-create-pelugem',
            'admin-edit-pelugem',
            'admin-delete-pelugem',
            'admin-view-pelugem',

            'admin-dashboard',
            'admin-welcome',
            'admin-calendar',

            'user-page',
            
            'calendar',
            'dashboard',

            'create-pet',
            'edit-pet',
            'delete-pet',
            'view-pet',

            'create-appointment',
            'edit-appointment',
            'delete-appointment',
            'view-appointment',
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
            'user-page',
            
            'calendar',
            'dashboard',

            'create-pet',
            'edit-pet',
            'delete-pet',
            'view-pet',

            'create-appointment',
            'edit-appointment',
            'delete-appointment',
            'view-appointment',
        ];

        foreach ($userPermissions as $permission){
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'admin']);

        //atribuindo permissoes de admin

        $adminPermissions = [
            'admin-page',

            'admin-create-user',
            'admin-edit-user',
            'admin-delete-user',
            'admin-view-user',

            'admin-create-appointment',
            'admin-edit-appointment',
            'admin-delete-appointment',
            'admin-view-appointment',

            'admin-create-pet',
            'admin-edit-pet',
            'admin-delete-pet',
            'admin-view-pet',
            
            'admin-create-admin',
            'admin-edit-admin',
            'admin-view-admin',

            'admin-create-pelugem',
            'admin-edit-pelugem',
            'admin-delete-pelugem',
            'admin-view-pelugem',

            'admin-dashboard',
            'admin-welcome',
            'admin-calendar',
        ];

        foreach ($adminPermissions as $permission){
            $role->givePermissionTo($permission);
        }
    }
}
