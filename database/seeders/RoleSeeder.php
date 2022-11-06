<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Role::create(['name' => 'Admin A', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Admin B', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Admin C', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Author A', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Author B', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
    }
}
