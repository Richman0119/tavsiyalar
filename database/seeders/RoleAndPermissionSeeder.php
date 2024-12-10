<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Permission::create(['name' => 'manage all recommendations']); // Admin can manage all
    Permission::create(['name' => 'manage own recommendations']); // User can manage own
    Permission::create(['name' => 'edit own recommendation']);
    Permission::create(['name' => 'delete own recommendation']);

    // Create roles and assign permissions
    $adminRole = Role::create(['name' => 'admin']);
    $adminRole->givePermissionTo(['manage all recommendations']);

    $userRole = Role::create(['name' => 'user']);
    $userRole->givePermissionTo(['manage own recommendations']);


    $role = Role::findByName('user');
    $role->givePermissionTo(['edit own recommendation', 'delete own recommendation']);


    }
}
