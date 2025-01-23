<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Vendor\Models\Vendor;
use Modules\Vendor\Models\VendorPayment;

class VendorPaymentFactory extends Factory
{
    protected $model = VendorPayment::class;

    public function definition(): array
    {
        return [
            'amount'         => fake()->randomFloat(),
            'payment_date'   => Carbon::now(),
            'payment_method' => fake()->word(),
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),

            'vendor_id' => Vendor::factory(),
        ];
    }
}
