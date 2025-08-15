<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::firstOrCreate(['name' => 'view dashboard']);
        Role::whereIn('name', ['admin', 'writer'])
        ->each(fn($role) => $role->givePermissionTo($permission));
    }
}
