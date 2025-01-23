<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Orders\Models\OrderRefundStatus;

class OrderRefundStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Pending',
            'Processing',
            'Partially Refunded',
            'Refunded',
            'Failed',
            'Cancelled',
            'Declined',
        ];

        OrderRefundStatus::insert(array_map(fn (string $name) => [
            'name'       => $name,
            'created_at' => now(),
            'updated_at' => now(),
        ], $statuses));
    }
}
