<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Inventory\Models\Product;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\Wishlist\Models\Wishlist;

class WishlistSeeder extends Seeder
{
    public function run(): void
    {
        $userRole = Role::where('name', 'User')->first();
        $users = User::where('role_id', $userRole->id)->get();
        $products = Product::all();
        $wishlists = [];

        foreach ($users as $user) {
            $wishlistProducts = $products->random(rand(3, 8));

            foreach ($wishlistProducts as $product) {
                $wishlists[] = [
                    'user_id'    => $user->id,
                    'product_id' => $product->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Wishlist::insert($wishlists);
    }
}
