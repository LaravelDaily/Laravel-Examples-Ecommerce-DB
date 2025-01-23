<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // User Management
            ['name' => 'view_users'],
            ['name' => 'create_users'],
            ['name' => 'edit_users'],
            ['name' => 'delete_users'],

            // Role Management
            ['name' => 'view_roles'],
            ['name' => 'manage_roles'],

            // Vendor Management
            ['name' => 'view_vendors'],
            ['name' => 'create_vendors'],
            ['name' => 'edit_vendors'],
            ['name' => 'delete_vendors'],

            // Product Management
            ['name' => 'view_products'],
            ['name' => 'create_products'],
            ['name' => 'edit_products'],
            ['name' => 'delete_products'],

            // Category Management
            ['name' => 'view_categories'],
            ['name' => 'manage_categories'],

            // Order Management
            ['name' => 'view_orders'],
            ['name' => 'manage_orders'],
            ['name' => 'cancel_orders'],

            // Customer Service
            ['name' => 'view_customer_data'],
            ['name' => 'manage_refunds'],
        ];

        $permissionsToInsert = array_map(function ($permission) {
            return [
                'name'       => $permission['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $permissions);

        Permission::insert($permissionsToInsert);
    }
}
