<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Inventory\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [];
        $childCategories = [];

        // Main categories with their children
        $categoryData = [
            ['name' => 'Electronics', 'children' => [
                'Smartphones',
                'Laptops',
                'Accessories',
            ]],
            ['name' => 'Fashion', 'children' => [
                'Men\'s Clothing',
                'Women\'s Clothing',
            ]],
            ['name' => 'Home & Living', 'children' => [
                'Furniture',
                'Decor',
            ]],
            ['name' => 'Sports', 'children' => [
                'Equipment',
                'Clothing',
            ]],
            ['name' => 'Beauty', 'children' => [
                'Skincare',
                'Makeup',
            ]],
        ];

        // First, insert main categories
        foreach ($categoryData as $category) {
            $categories[] = [
                'name'       => $category['name'],
                'parent_id'  => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        ProductCategory::insert($categories);

        // Then, insert child categories
        $parentCategories = ProductCategory::all()->keyBy('name');

        foreach ($categoryData as $category) {
            $parentId = $parentCategories[$category['name']]->id;
            foreach ($category['children'] as $childName) {
                $childCategories[] = [
                    'name'       => $childName,
                    'parent_id'  => $parentId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        ProductCategory::insert($childCategories);
    }
}
