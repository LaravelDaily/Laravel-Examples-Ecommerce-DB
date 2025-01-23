<?php

namespace Modules\Shipping\Actions;

use Modules\Orders\Models\Order;
use Modules\Shipping\Models\OrderShipment;

class CreateShippingLabel
{
    public function __construct(private Order $order)
    {
    }

    public function execute(): OrderShipment
    {
        return OrderShipment::create([
            'order_id' => $this->order->id,
            'tracking_number' => '123456789',
            'shipping_label' => 'shipping_label.pdf',
        ]);
    }
}