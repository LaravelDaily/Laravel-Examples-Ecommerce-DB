<?php

namespace Modules\Cart\Actions;

use Modules\Cart\Models\Cart;
use Modules\Orders\Models\Order;
use Modules\Shipping\Actions\CreateShippingLabel;
use Modules\User\Models\UserAddress;

class CreateOrderFromCart
{
    public function __construct(private Cart $cart, private UserAddress $address)
    {
    }

    public function execute(): Order
    {
        // Create order from cart to database
        $order = Order::create([
            'user_id' => $this->cart->user_id,
            'address_id' => $this->address->id,
            'total' => $this->cart->total,
        ]);

        (new CreateShippingLabel($order))->execute();

        return $order;
    }
}