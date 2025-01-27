<?php

namespace Modules\Cart\Actions;

use Modules\Cart\Models\Cart;
use Modules\Orders\Actions\CreateOrderFromCart;
use Modules\Orders\Models\Order;
use Modules\User\Models\UserAddress;

class TransformToOrder
{
    public function __construct(private Cart $cart, private UserAddress $userAddress)
    {
    }

    public function execute(): Order
    {
        $order = (new CreateOrderFromCart($this->cart, $this->userAddress))->execute();

        $this->cart->update(['completed']);

        return $order;
    }
}