<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;
use Modules\Vendor\Models\VendorReview;

class VendorReviewsSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = Vendor::all();
        $userRole = Role::where('name', 'User')->first();
        $users = User::where('role_id', $userRole->id)->get();

        $reviews = [];
        foreach ($vendors as $vendor) {
            $reviewCount = rand(5, 15);
            for ($i = 0; $i < $reviewCount; $i++) {
                $reviews[] = [
                    'vendor_id'  => $vendor->id,
                    'user_id'    => $users->random()->id,
                    'rating'     => rand(1, 5),
                    'comment'    => "Review comment " . ($i + 1) . " for vendor " . $vendor->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        VendorReview::insert($reviews);
    }
}
