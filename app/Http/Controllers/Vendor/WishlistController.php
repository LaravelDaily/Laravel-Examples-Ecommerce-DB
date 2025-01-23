<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Modules\Wishlist\Models\Wishlist;

class WishlistController extends Controller
{
    public function index() {}

    public function store(Wishlist $wishlist) {}

    public function destroy(Wishlist $wishlist) {}
}
