<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Orders\Models\Order;
use Modules\Shipping\Models\OrderShipment;

class OrderShipmentFactory extends Factory
{
    protected $model = OrderShipment::class;

    public function definition(): array
    {
        return [
            'tracking_number' => fake()->word(),
            'carrier'         => fake()->word(),
            'status'          => fake()->word(),
            'shipped_at'      => Carbon::now(),
            'delivered_at'    => Carbon::now(),
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),

            'order_id' => Order::factory(),
        ];
    }
}
