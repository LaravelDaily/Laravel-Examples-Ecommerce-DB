<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Inventory\Models\Product;
use Modules\Reviews\Models\Review;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'rating'     => fake()->randomNumber(),
            'comment'    => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id'    => User::factory(),
            'product_id' => Product::factory(),
            'vendor_id'  => Vendor::factory(),
        ];
    }
}
