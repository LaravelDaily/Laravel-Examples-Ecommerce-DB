<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Inventory\Models\ProductStatus;

class ProductStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'Active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Inactive', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Out Of Stock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Discontinued', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coming Soon', 'created_at' => now(), 'updated_at' => now()],
        ];

        ProductStatus::insert($statuses);
    }
}
