<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate(["name" => "view product", "guard_name" => "web"]);
        Permission::firstOrCreate(["name" => "create product", "guard_name" => "web"]);
        Permission::firstOrCreate(["name" => "edit product", "guard_name" => "web"]);
        Permission::firstOrCreate(["name" => "delete product", "guard_name" => "web"]);

        $role = Role::firstOrCreate(["name" => "defualt role", "guard_name" => "web"]);

        if ($role) {
            $role->syncPermissions(['view product', 'create product', 'edit product', 'delete product']);
        }
    }
}
