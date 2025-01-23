<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\History\Models\BrowsingHistory;
use Modules\Inventory\Models\Product;
use Modules\User\Models\User;

class BrowsingHistoryFactory extends Factory
{
    protected $model = BrowsingHistory::class;

    public function definition(): array
    {
        return [
            'viewed_at'  => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id'    => User::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
