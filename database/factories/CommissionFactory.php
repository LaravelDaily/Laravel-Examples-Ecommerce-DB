<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Orders\Models\Order;
use Modules\Vendor\Models\Commission;
use Modules\Vendor\Models\Vendor;

class CommissionFactory extends Factory
{
    protected $model = Commission::class;

    public function definition(): array
    {
        return [
            'amount'     => fake()->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'vendor_id' => Vendor::factory(),
            'order_id'  => Order::factory(),
        ];
    }
}
