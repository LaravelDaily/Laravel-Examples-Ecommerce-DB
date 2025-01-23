<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Inventory\Models\Product;
use Modules\Inventory\Models\ProductVariant;
use Modules\Orders\Models\Order;
use Modules\Orders\Models\OrderItem;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'quantity'   => fake()->randomNumber(),
            'price'      => fake()->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_id'           => Order::factory(),
            'product_id'         => Product::factory(),
            'product_variant_id' => ProductVariant::factory(),
        ];
    }
}
