<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;
use Modules\Vendor\Models\VendorReview;

class VendorReviewFactory extends Factory
{
    protected $model = VendorReview::class;

    public function definition(): array
    {
        return [
            'rating'     => fake()->randomNumber(),
            'comment'    => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'vendor_id' => Vendor::factory(),
            'user_id'   => User::factory(),
        ];
    }
}
