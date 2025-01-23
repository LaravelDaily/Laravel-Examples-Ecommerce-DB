<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Orders\Models\OrderRefund;
use Modules\Shipping\Models\OrderReturn;

class OrderRefundFactory extends Factory
{
    protected $model = OrderRefund::class;

    public function definition(): array
    {
        return [
            'amount'       => fake()->randomFloat(),
            'status'       => fake()->word(),
            'processed_at' => Carbon::now(),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),

            'order_return_id' => OrderReturn::factory(),
        ];
    }
}
