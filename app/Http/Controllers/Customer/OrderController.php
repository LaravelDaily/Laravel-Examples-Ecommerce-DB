<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Modules\Cart\Actions\TransformToOrder;
use Modules\Cart\Models\Cart;
use Modules\Orders\Models\Order;
use Modules\User\Models\UserAddress;

class OrderController extends Controller
{
    public function index() {}

    public function show(Order $order) {}

    public function store(Cart $cart, UserAddress $userAddress): Order
    {
        return (new TransformToOrder($cart, $userAddress))->execute();
    }
}
