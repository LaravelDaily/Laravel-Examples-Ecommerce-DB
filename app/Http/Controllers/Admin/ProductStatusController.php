<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Inventory\Models\ProductStatus;

class ProductStatusController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(ProductStatus $productStatus) {}

    public function update(Request $request, ProductStatus $productStatus) {}

    public function destroy(ProductStatus $productStatus) {}
}
