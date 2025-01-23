<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Inventory\Models\Product;
use Modules\Inventory\Models\ProductReview;
use Modules\User\Models\User;

class ProductReviewFactory extends Factory
{
    protected $model = ProductReview::class;

    public function definition(): array
    {
        return [
            'rating'     => fake()->randomNumber(),
            'comment'    => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'product_id' => Product::factory(),
            'user_id'    => User::factory(),
        ];
    }
}
