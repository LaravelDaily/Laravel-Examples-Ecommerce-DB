<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Modules\Cart\Models\Cart;
use Modules\Inventory\Models\Product;

class CartController extends Controller
{
    public function index() {}

    public function store(Product $product) {}

    public function destroy(Cart $cart) {}
}
