<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Orders\Models\OrderStatus;

class OrderStatusController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(OrderStatus $orderStatus) {}

    public function update(Request $request, OrderStatus $orderStatus) {}

    public function destroy(OrderStatus $orderStatus) {}
}
