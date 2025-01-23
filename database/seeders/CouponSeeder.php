<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payments\Models\Coupon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [];
        $now = now();

        for ($i = 0; $i < 20; $i++) {
            $isPercentage = rand(0, 1) === 1;
            $coupons[] = [
                'code'        => strtoupper(fake()->bothify('??##??')),
                'discount'    => $isPercentage ? rand(5, 50) : rand(500, 5000),
                'type'        => $isPercentage ? 'percentage' : 'fixed',
                'valid_from'  => $now->copy()->subDays(rand(0, 30)),
                'valid_to'    => $now->copy()->addDays(rand(1, 90)),
                'usage_limit' => rand(0, 1) ? rand(50, 200) : null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        Coupon::insert($coupons);
    }
}
