<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Orders\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Pending Payment',
            'Processing',
            'Confirmed',
            'Shipped',
            'Out for Delivery',
            'Delivered',
            'Cancelled',
            'Refunded',
            'Failed',
            'On Hold',
        ];

        OrderStatus::insert(array_map(fn (string $name) => [
            'name'       => $name,
            'created_at' => now(),
            'updated_at' => now(),
        ], $statuses));
    }
}
