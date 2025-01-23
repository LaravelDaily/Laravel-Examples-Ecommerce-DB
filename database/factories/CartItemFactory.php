<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Cart\Models\Cart;
use Modules\Cart\Models\CartItem;
use Modules\Inventory\Models\Product;
use Modules\Inventory\Models\ProductVariant;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition(): array
    {
        return [
            'quantity'   => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'cart_id'            => Cart::factory(),
            'product_id'         => Product::factory(),
            'product_variant_id' => ProductVariant::factory(),
        ];
    }
}
