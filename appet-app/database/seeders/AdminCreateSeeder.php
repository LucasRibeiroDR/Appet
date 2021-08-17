<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class AdminCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'cpf' => '0000000000',
            'rg' => '101234567',
            'telefone' => '4335420000',
            'endereco' => 'admin',
            'email' => 'admin@admin.com',
            'student'=>'Não',
            'ra'=>'321654896615553',
            'password' => Hash::make('adminadmin'),
        ]);

        $admin->assignRole('admin');
    }
}