<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin', 'description' => 'Full system access'],
            ['name' => 'Admin', 'description' => 'Administrative access'],
            ['name' => 'Vendor Manager', 'description' => 'Can manage multiple vendors'],
            ['name' => 'Vendor', 'description' => 'Single vendor access'],
            ['name' => 'Customer Service', 'description' => 'Support team access'],
            ['name' => 'Content Manager', 'description' => 'Manage product content'],
            ['name' => 'User', 'description' => 'Regular customer access'],
            ['name' => 'Guest', 'description' => 'Limited browse access'],
        ];

        $rolesToInsert = array_map(function ($role) {
            return [
                'name'       => $role['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $roles);

        Role::insert($rolesToInsert);
    }
}
