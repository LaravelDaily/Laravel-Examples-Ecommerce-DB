<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Inventory\Models\Product;
use Modules\Inventory\Models\ProductTag;

class ProductTagFactory extends Factory
{
    protected $model = ProductTag::class;

    public function definition(): array
    {
        return [
            'name'       => fake()->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'product_id' => Product::factory(),
        ];
    }
}
