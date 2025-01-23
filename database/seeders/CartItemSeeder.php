<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cart\Models\Cart;
use Modules\Cart\Models\CartItem;
use Modules\Inventory\Models\Product;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $carts = Cart::all();
        $products = Product::with('productVariants')->get();
        $cartItems = [];

        foreach ($carts as $cart) {
            $cartProducts = $products->random(rand(1, 5));

            foreach ($cartProducts as $product) {
                $variant = $product->productVariants->random();
                $cartItems[] = [
                    'cart_id'            => $cart->id,
                    'product_id'         => $product->id,
                    'product_variant_id' => rand(0, 1) ? $variant->id : null,
                    'quantity'           => rand(1, 3),
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ];
            }
        }

        CartItem::insert($cartItems);
    }
}
