<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Inventory\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(ProductCategory $productCategory) {}

    public function edit(ProductCategory $productCategory) {}

    public function update(Request $request, ProductCategory $productCategory) {}

    public function destroy(ProductCategory $productCategory) {}
}
