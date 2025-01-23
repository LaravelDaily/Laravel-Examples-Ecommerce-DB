<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Vendor\Models\Vendor;

class VendorController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(Vendor $vendor) {}

    public function edit(Vendor $vendor) {}

    public function update(Request $request, Vendor $vendor) {}

    public function destroy(Vendor $vendor) {}
}
