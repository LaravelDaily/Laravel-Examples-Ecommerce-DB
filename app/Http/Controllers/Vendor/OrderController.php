<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Modules\Orders\Models\Order;

class OrderController extends Controller
{
    public function index() {}

    public function show(Order $order) {}
}
