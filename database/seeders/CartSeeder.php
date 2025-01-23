<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cart\Models\Cart;
use Modules\User\Models\Role;
use Modules\User\Models\User;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $userRole = Role::where('name', 'User')->first();
        $users = User::where('role_id', $userRole->id)->get();
        $carts = [];

        foreach ($users as $user) {
            if (rand(0, 1)) {  // 50% chance of having a cart
                $carts[] = [
                    'user_id'    => $user->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Cart::insert($carts);
    }
}
