<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Orders\Models\OrderItem;
use Modules\Shipping\Models\OrderReturn;

class OrderReturnFactory extends Factory
{
    protected $model = OrderReturn::class;

    public function definition(): array
    {
        return [
            'reason'     => fake()->word(),
            'status'     => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_item_id' => OrderItem::factory(),
        ];
    }
}
