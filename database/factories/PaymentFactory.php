<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Orders\Models\Order;
use Modules\Payments\Models\Payment;
use Modules\User\Models\User;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'amount'       => fake()->randomFloat(),
            'method'       => fake()->word(),
            'status'       => fake()->word(),
            'processed_at' => Carbon::now(),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),

            'order_id' => Order::factory(),
            'user_id'  => User::factory(),
        ];
    }
}
