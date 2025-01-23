<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Orders\Models\Order;

class OrderController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(Order $order) {}

    public function edit(Order $order) {}

    public function update(Request $request, Order $order) {}

    public function destroy(Order $order) {}

    public function updateStatus(Order $order) {}
}
