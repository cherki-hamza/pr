<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Permission::create(['name' => 'filemanager']);
        Permission::create(['name' => 'read module']); */

        Permission::create(['name' => 'delete_project']);
        Permission::create(['name' => 'update_project']);
        Permission::create(['name' => 'read_project']);
        Permission::create(['name' => 'create_project']);

        Permission::create(['name' => 'delete_user']);
        Permission::create(['name' => 'update_user']);
        Permission::create(['name' => 'read_user']);
        Permission::create(['name' => 'create_user']);

        Permission::create(['name' => 'delete_role']);
        Permission::create(['name' => 'update_role']);
        Permission::create(['name' => 'read_role']);
        Permission::create(['name' => 'create_role']);

        Permission::create(['name' => 'delete_permission']);
        Permission::create(['name' => 'update_permission']);
        Permission::create(['name' => 'read_permission']);
        Permission::create(['name' => 'create_permission']);
    }
}
