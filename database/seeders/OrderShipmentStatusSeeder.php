<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Shipping\Models\OrderShipmentStatus;

class OrderShipmentStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Pending',
            'Shipped',
            'In Transit',
            'Delivered',
            'Returned',
            'Cancelled',
        ];

        OrderShipmentStatus::insert(array_map(fn (string $name) => [
            'name'       => $name,
            'created_at' => now(),
            'updated_at' => now(),
        ], $statuses));
    }
}
