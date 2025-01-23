<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Inventory\Models\Product;
use Modules\Orders\Models\Order;
use Modules\Orders\Models\OrderItem;
use Modules\Orders\Models\OrderRefund;
use Modules\Orders\Models\OrderRefundStatus;
use Modules\Orders\Models\OrderStatus;
use Modules\Shipping\Models\OrderReturn;
use Modules\Shipping\Models\OrderReturnStatus;
use Modules\Shipping\Models\OrderShipment;
use Modules\Shipping\Models\OrderShipmentStatus;
use Modules\User\Models\User;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $products = Product::with('productVariants')->get();
        $statuses = OrderStatus::pluck('id')->toArray();
        $returnStatuses = OrderReturnStatus::pluck('id', 'name')->toArray();
        $refundStatuses = OrderRefundStatus::pluck('id', 'name')->toArray();
        $orderShipmentStatuses = OrderShipmentStatus::pluck('id')->toArray();

        $orders = [];
        $orderItems = [];
        $shipments = [];
        $returns = [];
        $refunds = [];

        for ($i = 0; $i < 100; $i++) {
            $orderId = $i + 1;
            $createdAt = Carbon::now()->subDays(rand(1, 90));
            $totalAmount = 0;

            $orders[] = [
                'id'           => $orderId,
                'user_id'      => $users[array_rand($users)],
                'status_id'    => $statuses[array_rand($statuses)],
                'total_amount' => 0, // Will update after calculating items
                'created_at'   => $createdAt,
                'updated_at'   => $createdAt,
            ];

            $orderProducts = $products->random(rand(1, 5));
            foreach ($orderProducts as $product) {
                $quantity = rand(1, 5);
                $variant = $product->productVariants->count() > 0 ? $product->productVariants->random() : null;
                $price = $product->price + ($variant ? ($variant->additional_price ?? 0) : 0);

                $orderItems[] = [
                    'order_id'           => $orderId,
                    'product_id'         => $product->id,
                    'product_variant_id' => $variant ? $variant->id : null,
                    'quantity'           => $quantity,
                    'price'              => $price,
                    'created_at'         => $createdAt,
                    'updated_at'         => $createdAt,
                ];

                $totalAmount += $price * $quantity;
            }

            // Update order total
            $orders[$i]['total_amount'] = $totalAmount;

            if (rand(1, 100) <= 70) {
                $shippedAt = Carbon::parse($createdAt)->addDays(rand(1, 3));
                $shipments[] = [
                    'order_id'        => $orderId,
                    'tracking_number' => strtoupper(fake()->bothify('??##????##')),
                    'carrier'         => fake()->randomElement(['FedEx', 'UPS', 'DHL', 'USPS']),
                    'order_shipment_status_id' => $orderShipmentStatuses[array_rand($orderShipmentStatuses)],
                    'shipped_at'      => $shippedAt,
                    'delivered_at'    => rand(1, 100) <= 60 ? $shippedAt->addDays(rand(2, 5)) : null,
                    'created_at'      => $createdAt,
                    'updated_at'      => $createdAt,
                ];
            }
        }

        Order::insert($orders);
        OrderItem::insert($orderItems);
        OrderShipment::insert($shipments);

        $allOrderItems = OrderItem::pluck('id')->toArray();
        $returnItemIds = array_rand(array_flip($allOrderItems), (int) (count($allOrderItems) * 0.2));

        foreach ($returnItemIds as $itemId) {
            $returnId = count($returns) + 1;
            $createdAt = Carbon::now()->subDays(rand(1, 30));

            $returns[] = [
                'id'            => $returnId,
                'order_item_id' => $itemId,
                'reason'        => fake()->sentence(),
                'order_return_status_id' => $returnStatuses[array_rand($returnStatuses)],
                'created_at'    => $createdAt,
                'updated_at'    => $createdAt,
            ];

            if (rand(1, 100) <= 60) {
                $refunds[] = [
                    'order_return_id' => $returnId,
                    'amount'          => rand(100, 1000),
                    'order_refund_status_id' => $refundStatuses[array_rand($refundStatuses)],
                    'processed_at'    => $createdAt->addDays(rand(1, 5)),
                    'created_at'      => $createdAt,
                    'updated_at'      => $createdAt,
                ];
            }
        }

        OrderReturn::insert($returns);
        OrderRefund::insert($refunds);
    }
}
