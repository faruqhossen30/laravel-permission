<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create role
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        $permissions = [
            // Dashboard
            'Dashboard.view',
            // blog permission
            'blog.create',
            'blog.view',
            'blog.update',
            'blog.delete',
            'blog approve',

            // admin permission
            'admin.create',
            'admin.view',
            'admin.update',
            'admin.delete',
            'admin approve',

            // role permission
            'role.create',
            'role.view',
            'role.update',
            'role.delete',
            'role approve',

            // profile permission
            'profile.view',
            'profile.update',
        ];

        for ($i=0; $i < count($permissions) ; $i++) {
            $permission = Permission::create(['name'=>$permissions[$i]]);
            $roleSuperAdmin->revokePermissionTo($permission);
            $permission->removeRole($roleSuperAdmin);


        }

    }
}
