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
            'create-pet',
            'create-admin',
            'edit-pet',
            'edit-user',
            'edit-appointment',
            'delete-pet',
            'delete-appointment',
            'admin-page',
            'admin-dashboard'
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
            'create-appointment',
        ];

        foreach ($userPermissions as $permission){
            $role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'admin']);

        //atribuindo permissoes de admin

        $adminPermissions = [
            'create-user',
            'create-appointment',
            'create-pet',
            'create-admin',
            'edit-pet',
            'edit-user',
            'edit-appointment',
            'delete-pet',
            'delete-appointment',
            'admin-page',
            'admin-dashboard'
        ];

        foreach ($adminPermissions as $permission){
            $role->givePermissionTo($permission);
        }
    }
}
