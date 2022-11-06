<?php

namespace Database\Seeders;

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
        Permission::create(['name' => 'Create_Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Index_Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Edit_Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Delete_Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

        Permission::create(['name' => 'Create_City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Index_City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Edit_City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Delete_City', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);


        Permission::create(['name' => "Create-Admin", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => "Index-Admin", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => "Edit-Admin", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => "Delete-Admin", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);

        Permission::create(['name' => "Create-City", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => "Index-City", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => "Edit-City", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => "Delete-City", 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
    }
}
