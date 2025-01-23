<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Inventory\Models\Product;

class ProductController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(Product $product) {}

    public function update(Request $request, Product $product) {}

    public function destroy(Product $product) {}
}
