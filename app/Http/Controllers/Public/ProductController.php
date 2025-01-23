<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Modules\Inventory\Models\Product;

class ProductController extends Controller
{
    public function index() {}

    public function show(Product $product) {}
}
