<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Inventory\Models\ProductTag;

class ProductTagController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(ProductTag $productTag) {}

    public function edit(ProductTag $productTag) {}

    public function update(Request $request, ProductTag $productTag) {}

    public function destroy(ProductTag $productTag) {}
}
