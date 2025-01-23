<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Orders\Models\OrderRefundStatus;

class RefundStatusController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(OrderRefundStatus $orderRefundStatus) {}

    public function update(Request $request, OrderRefundStatus $orderRefundStatus) {}

    public function destroy(OrderRefundStatus $orderRefundStatus) {}
}
