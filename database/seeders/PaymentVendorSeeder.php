<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Orders\Models\Order;
use Modules\Payments\Models\Payment;
use Modules\Payments\Models\PaymentMethod;
use Modules\Vendor\Models\Commission;
use Modules\Vendor\Models\Vendor;
use Modules\Vendor\Models\VendorEarning;

class PaymentVendorSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::with('user')->get();
        $paymentMethods = PaymentMethod::pluck('id')->toArray();
        $vendors = Vendor::pluck('id')->toArray();

        $payments = [];
        $vendorEarnings = [];
        $commissions = [];

        foreach ($orders as $order) {
            // Payment
            $createdAt = Carbon::parse($order->created_at);
            $payments[] = [
                'order_id'          => $order->id,
                'user_id'           => $order->user_id,
                'payment_method_id' => $paymentMethods[array_rand($paymentMethods)],
                'amount'            => $order->total_amount,
                'status'            => fake()->randomElement(['completed', 'pending', 'failed']),
                'processed_at'      => $createdAt->addMinutes(rand(1, 60)),
                'created_at'        => $createdAt,
                'updated_at'        => $createdAt,
            ];

            // Vendor earnings and commissions (for random vendor)
            $vendorId = $vendors[array_rand($vendors)];
            $amount = $order->total_amount * 0.8; // 80% to vendor
            $commission = $order->total_amount * 0.2; // 20% commission

            $vendorEarnings[] = [
                'vendor_id'  => $vendorId,
                'order_id'   => $order->id,
                'amount'     => $amount,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];

            $commissions[] = [
                'vendor_id'  => $vendorId,
                'order_id'   => $order->id,
                'amount'     => $commission,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        Payment::insert($payments);
        VendorEarning::insert($vendorEarnings);
        Commission::insert($commissions);
    }
}
