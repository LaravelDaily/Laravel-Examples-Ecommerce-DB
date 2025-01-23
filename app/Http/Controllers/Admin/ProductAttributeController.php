<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Inventory\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(ProductAttribute $productAttribute) {}

    public function update(Request $request, ProductAttribute $productAttribute) {}

    public function destroy(ProductAttribute $productAttribute) {}
}
