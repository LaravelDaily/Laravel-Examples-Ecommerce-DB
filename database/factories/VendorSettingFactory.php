<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Vendor\Models\Vendor;
use Modules\Vendor\Models\VendorSetting;

class VendorSettingFactory extends Factory
{
    protected $model = VendorSetting::class;

    public function definition(): array
    {
        return [
            'key'        => fake()->word(),
            'value'      => fake()->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'vendor_id' => Vendor::factory(),
        ];
    }
}
