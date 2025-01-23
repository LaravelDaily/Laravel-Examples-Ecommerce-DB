<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\User\Models\User;
use Modules\User\Models\UserAddress;

class UserAddressFactory extends Factory
{
    protected $model = UserAddress::class;

    public function definition(): array
    {
        return [
            'address_line1' => fake()->address(),
            'address_line2' => fake()->address(),
            'city'          => fake()->city(),
            'state'         => fake()->word(),
            'country'       => fake()->country(),
            'postal_code'   => fake()->postcode(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
