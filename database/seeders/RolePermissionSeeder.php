<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Createpermissions first

        $permissions = [
            'manage users',
            'create posts',
            'manage posts',
            'edit own posts',
            'delete own posts',
            'view posts'
        ];

        
        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

        // Then roles

        $admin = Role::create(['name' => 'admin']);
        $writer = Role::create(['name' => 'writer']);
        $reader = Role::create(['name' => 'reader']);


        // Then assign permissions to roles:

        $admin->givePermissionTo(Permission::all());

        $writer->givePermissionTo(['create posts', 'edit own posts', 'delete own posts', 'view posts']);

        $reader->givePermissionTo(['view posts']);

    }
}
