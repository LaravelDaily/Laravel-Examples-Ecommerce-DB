<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Payments\Models\Coupon;

class CouponController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(Coupon $coupon) {}

    public function update(Request $request, Coupon $coupon) {}

    public function destroy(Coupon $coupon) {}
}
