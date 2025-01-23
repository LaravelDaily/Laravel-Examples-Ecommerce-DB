<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Shipping\Models\OrderReturn;

class ReturnController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(OrderReturn $orderReturn) {}

    public function edit(OrderReturn $orderReturn) {}

    public function update(Request $request, OrderReturn $orderReturn) {}

    public function destroy(OrderReturn $orderReturn) {}
}
