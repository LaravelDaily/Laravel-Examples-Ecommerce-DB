<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Inventory\Models\ProductAttribute;

class ProductAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = ['Color', 'Size', 'Material', 'Storage', 'RAM'];

        $attributesToInsert = array_map(function ($attribute) {
            return [
                'name'       => $attribute,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $attributes);

        ProductAttribute::insert($attributesToInsert);
    }
}
