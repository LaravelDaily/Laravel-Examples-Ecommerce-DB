<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Shipping\Models\OrderReturnStatus;

class OrderReturnStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Requested',
            'Under Review',
            'Approved',
            'Rejected',
            'Return Shipped',
            'Return Received',
            'Completed',
            'Cancelled',
        ];

        OrderReturnStatus::insert(array_map(fn ($name) => [
            'name'       => $name,
            'created_at' => now(),
            'updated_at' => now(),
        ], $statuses));
    }
}
