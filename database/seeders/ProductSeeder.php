<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Modules\Inventory\Models\Product;
use Modules\Inventory\Models\ProductAttribute;
use Modules\Inventory\Models\ProductCategory;
use Modules\Inventory\Models\ProductStatus;
use Modules\Inventory\Models\ProductTag;
use Modules\Inventory\Models\ProductVariant;
use Modules\Vendor\Models\Vendor;

class ProductSeeder extends Seeder
{
    private array $tagsByCategory = [
        'Electronics' => ['wireless', '4K', 'smart', 'bluetooth', 'portable', 'rechargeable', 'HD', 'LED', 'gaming', 'USB-C'],
        'Smartphones' => ['5G', 'dual-sim', 'android', 'ios', 'fast-charging', 'AMOLED'],
        'Laptops'     => ['SSD', 'lightweight', 'gaming', 'business', 'ultrabook', 'touch-screen'],
        'Accessories' => ['wireless', 'protective', 'premium', 'portable', 'durable'],

        'Fashion'           => ['casual', 'formal', 'trendy', 'vintage', 'summer', 'winter', 'spring', 'autumn'],
        'Men\'s Clothing'   => ['cotton', 'leather', 'slim-fit', 'regular-fit', 'sports', 'business'],
        'Women\'s Clothing' => ['cotton', 'silk', 'casual', 'party-wear', 'office-wear', 'designer'],

        'Home & Living' => ['modern', 'classic', 'eco-friendly', 'handmade', 'premium'],
        'Furniture'     => ['wooden', 'metal', 'plastic', 'foldable', 'storage', 'outdoor'],
        'Decor'         => ['wall-art', 'lighting', 'handcrafted', 'vintage', 'modern'],

        'Sports'          => ['professional', 'training', 'outdoor', 'indoor', 'competition'],
        'Equipment'       => ['durable', 'lightweight', 'professional', 'beginner-friendly'],
        'Sports Clothing' => ['breathable', 'moisture-wicking', 'compression', 'lightweight'],

        'Beauty'   => ['organic', 'vegan', 'cruelty-free', 'natural', 'premium'],
        'Skincare' => ['anti-aging', 'moisturizing', 'sensitive-skin', 'oil-free'],
        'Makeup'   => ['long-lasting', 'waterproof', 'matte', 'shimmer', 'hypoallergenic'],
    ];

    private array $commonTags = ['new-arrival', 'best-seller', 'sale', 'limited-edition', 'premium', 'trending'];

    public function run(): void
    {
        $products = [];
        $variants = [];
        $productTags = [];
        $lastProductId = 0;

        $categories = ProductCategory::all();
        $vendors = Vendor::all();
        $attributes = ProductAttribute::all();
        $statuses = ProductStatus::all();

        // First, ensure all unique tags exist in product_tags table
        $allPossibleTags = $this->commonTags;
        foreach ($this->tagsByCategory as $categoryTags) {
            $allPossibleTags = array_merge($allPossibleTags, $categoryTags);
        }
        $uniqueTags = array_unique($allPossibleTags);

        $tagRecords = array_map(fn ($tag) => [
            'name'       => $tag,
            'created_at' => now(),
            'updated_at' => now(),
        ], $uniqueTags);

        ProductTag::insert($tagRecords);

        // Get all tags with their IDs
        $tagModels = ProductTag::all()->keyBy('name');

        // Prepare products data
        for ($i = 0; $i < 50; $i++) {
            $productId = $lastProductId + $i + 1;
            $category = $categories->random();

            // Find parent category if it's a subcategory
            $categoryName = $category->name;
            $parentCategory = null;
            if ($category->parent_id) {
                $parentCategory = $categories->firstWhere('id', $category->parent_id);
            }

            $products[] = [
                'id'                => $productId,
                'vendor_id'         => $vendors->random()->id,
                'product_category_id' => $category->id,
                'name'              => "Product " . ($i + 1),
                'description'       => "Description for product " . ($i + 1),
                'price'             => rand(10, 1000) + 0.99,
                'quantity'          => rand(10, 100),
                'product_status_id' => $statuses->random()->id,
                'created_at'        => now(),
                'updated_at'        => now(),
            ];

            // Generate tags for this product
            $selectedTags = [];

            // Add category-specific tags
            if (isset($this->tagsByCategory[$categoryName])) {
                $categoryTags = $this->tagsByCategory[$categoryName];
                $numCategoryTags = rand(2, 4);
                $selectedTags = array_merge($selectedTags, array_rand(array_flip($categoryTags), $numCategoryTags));
            }

            // Add parent category tags if exists
            if ($parentCategory && isset($this->tagsByCategory[$parentCategory->name])) {
                $numParentTags = rand(1, 3);
                $randomTags = $numParentTags === 1
                    ? [array_rand(array_flip($this->tagsByCategory[$parentCategory->name]))]
                    : array_rand(array_flip($this->tagsByCategory[$parentCategory->name]), $numParentTags);
                $selectedTags = array_merge($selectedTags, $randomTags);
            }

            // Add some common tags
            $numCommonTags = rand(1, 2);
            $randomTags = $numCommonTags === 1
                ? [array_rand(array_flip($this->commonTags))]
                : array_rand(array_flip($this->commonTags), $numCommonTags);
            $selectedTags = array_merge($selectedTags, $randomTags);

            // Remove duplicates and prepare pivot records
            $selectedTags = array_unique($selectedTags);
            foreach ($selectedTags as $tag) {
                $productTags[] = [
                    'product_id' => $productId,
                    'product_tag_id' => $tagModels[$tag]->id,
                ];
            }

            // Prepare variants (variants code remains the same)
            $selectedAttributes = $attributes->random(rand(1, 3));
            foreach ($selectedAttributes as $attribute) {
                $variantCount = rand(2, 4);
                for ($j = 0; $j < $variantCount; $j++) {
                    $variants[] = [
                        'product_id'       => $productId,
                        'product_attribute_id' => $attribute->id,
                        'value'            => $this->generateVariantValue($attribute->name),
                        'additional_price' => rand(0, 1) ? rand(5, 50) : null,
                        'quantity'         => rand(5, 30),
                        'created_at'       => now(),
                        'updated_at'       => now(),
                    ];
                }
            }
        }

        foreach ($products as $productData) {
            $product = Product::create($productData);
            $this->attachMedia($product);
        }

        // Bulk insert variants, and product-tag relationships
        ProductVariant::insert($variants);
        \DB::table('product_tag')->insert($productTags);
    }

    private function generateVariantValue(string $attributeName): string
    {
        $values = [
            'Color'    => ['Red', 'Blue', 'Green', 'Black', 'White', 'Yellow', 'Purple'],
            'Size'     => ['XS', 'S', 'M', 'L', 'XL', 'XXL'],
            'Material' => ['Cotton', 'Polyester', 'Leather', 'Metal', 'Plastic'],
            'Storage'  => ['64GB', '128GB', '256GB', '512GB', '1TB'],
            'RAM'      => ['4GB', '8GB', '16GB', '32GB'],
        ];

        $options = $values[$attributeName] ?? ['Option 1', 'Option 2', 'Option 3'];
        return $options[array_rand($options)];
    }

    private function attachMedia(Product $product): void
    {
        $images = collect(Storage::disk('local')->files('demo-images'));

        $product->addMediaFromDisk($images->random())
            ->preservingOriginal()
            ->toMediaCollection('featured_image');
    }
}
