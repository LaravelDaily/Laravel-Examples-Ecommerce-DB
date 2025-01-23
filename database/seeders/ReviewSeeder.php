<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Inventory\Models\Product;
use Modules\Reviews\Models\Review;
use Modules\User\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $products = Product::with('vendor')->get();

        $reviews = [];

        foreach ($products as $product) {
            $reviewCount = rand(3, 10);
            for ($i = 0; $i < $reviewCount; $i++) {
                $reviews[] = [
                    'user_id'    => $users[array_rand($users)],
                    'product_id' => $product->id,
                    'vendor_id'  => $product->vendor_id,
                    'rating'     => rand(1, 5),
                    'comment'    => fake()->paragraph(),
                    'created_at' => now()->subDays(rand(1, 180)),
                    'updated_at' => now()->subDays(rand(1, 180)),
                ];
            }
        }

        Review::insert($reviews);
    }
}
