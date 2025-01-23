<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Vendor\Models\Vendor;
use Modules\Vendor\Models\VendorPayment;

class VendorPaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $paymentMethods = ['bank_transfer', 'paypal', 'stripe', 'wire_transfer'];
        $vendors = Vendor::all();
        $payments = [];

        foreach ($vendors as $vendor) {
            for ($i = 0; $i < 12; $i++) {
                $payments[] = [
                    'vendor_id'      => $vendor->id,
                    'amount'         => rand(1000, 10000) + (rand(0, 99) / 100),
                    'payment_date'   => now()->subMonths($i),
                    'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ];
            }
        }

        VendorPayment::insert($payments);
    }
}
