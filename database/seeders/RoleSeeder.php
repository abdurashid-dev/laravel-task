<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $permissions = [
            ['name' => 'roles-list'],
            ['name' => 'roles-show'],
            ['name' => 'roles-create'],
            ['name' => 'roles-edit'],
            ['name' => 'roles-store'],
            ['name' => 'roles-update'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $adminRole = Role::where('name', 'Admin')->first();
        $adminRole->syncPermissions(Permission::all());
    }
}
