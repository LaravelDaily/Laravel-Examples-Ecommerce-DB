<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Orders\Models\OrderRefund;

class RefundController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(OrderRefund $orderRefund) {}

    public function edit(OrderRefund $orderRefund) {}

    public function update(Request $request, OrderRefund $orderRefund) {}

    public function destroy(OrderRefund $orderRefund) {}
}
