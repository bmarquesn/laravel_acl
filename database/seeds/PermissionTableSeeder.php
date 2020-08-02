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
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'empresa-list',
            'empresa-create',
            'empresa-edit',
            'empresa-delete',
            'endereco-list',
            'endereco-create',
            'endereco-edit',
            'endereco-delete',
            'usuario-list',
            'usuario-create',
            'usuario-edit',
            'usuario-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
