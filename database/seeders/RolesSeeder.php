<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'standard']);

        $permission_access_dashboard = Permission::create(['name' => 'access dashboard']);
        
        $permission_create_roles = Permission::create(['name' => 'create roles']);
        $permission_edit_roles = Permission::create(['name' => 'edit roles']);
        $permission_delete_roles = Permission::create(['name' => 'delete roles']);

        $permission_ban_user = Permission::create(['name' => 'ban user']);

        $permission_admin = [$permission_access_dashboard, $permission_create_roles, $permission_edit_roles, $permission_delete_roles, $permission_ban_user];

        $role_admin->syncPermissions($permission_admin);
    }
}
