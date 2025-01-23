<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Inventory\Models\Product;
use Modules\User\Models\User;
use Modules\Wishlist\Models\Wishlist;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id'    => User::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
