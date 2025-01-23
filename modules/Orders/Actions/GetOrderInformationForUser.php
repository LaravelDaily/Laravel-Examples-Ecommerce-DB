<?php

namespace Modules\Orders\Actions;

use Modules\Orders\Models\Order;

class GetOrderInformationForUser
{
    public Order $order;

    public function __construct(private int $orderID)
    {
        $this->order = Order::findOrFail($this->orderID);
    }

    public function execute(): Order
    {
        $this->order->load([
            'user',
        ]);

        return $this->order;
    }
}