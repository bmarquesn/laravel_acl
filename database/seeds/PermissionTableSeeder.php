<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'roles-list',
            'roles-create',
            'roles-edit',
            'roles-delete',
            'empresas-list',
            'empresas-create',
            'empresas-edit',
            'empresas-delete',
            'enderecos-list',
            'enderecos-create',
            'enderecos-edit',
            'enderecos-delete',
            'usuarios-list',
            'usuarios-create',
            'usuarios-edit',
            'usuarios-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
