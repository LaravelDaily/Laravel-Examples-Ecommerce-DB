<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Orders\Models\Order;
use Modules\User\Models\User;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'status'       => fake()->word(),
            'total_amount' => fake()->randomNumber(),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
