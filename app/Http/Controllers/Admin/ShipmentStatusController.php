<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shipping\Models\OrderShipmentStatus;

class ShipmentStatusController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(OrderShipmentStatus $orderShipmentStatus) {}

    public function update(Request $request, OrderShipmentStatus $orderShipmentStatus) {}

    public function destroy(OrderShipmentStatus $orderShipmentStatus) {}
}
