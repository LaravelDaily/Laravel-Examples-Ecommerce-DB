<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Payments\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(PaymentMethod $paymentMethod) {}

    public function update(Request $request, PaymentMethod $paymentMethod) {}

    public function destroy(PaymentMethod $paymentMethod) {}
}
