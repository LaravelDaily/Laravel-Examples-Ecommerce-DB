<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Inventory\Models\Product;
use Modules\Inventory\Models\ProductAttribute;
use Modules\Inventory\Models\ProductVariant;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        return [
            'value'            => fake()->word(),
            'additional_price' => fake()->randomFloat(),
            'quantity'         => fake()->randomNumber(),
            'created_at'       => Carbon::now(),
            'updated_at'       => Carbon::now(),

            'product_id'           => Product::factory(),
            'product_attribute_id' => ProductAttribute::factory(),
        ];
    }
}
