<?php

namespace Modules\Shipping\Actions;

use Modules\Orders\Models\Order;
use Modules\Shipping\Models\OrderShipment;

class MarkOrderAsShipped
{
    public function __construct(private Order $order)
    {
    }

    public function execute(): void
    {
        OrderShipment::where('order_id', $this->order->id)->update(['status' => 'shipped']);
    }
}