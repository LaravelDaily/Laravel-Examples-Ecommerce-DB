<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Modules\User\Models\User;
use Modules\Vendor\Models\Vendor;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = [
            ['name' => 'Fashion Forward', 'description' => 'Trendy clothing and accessories'],
            ['name' => 'Tech Haven', 'description' => 'Latest electronics and gadgets'],
            ['name' => 'Home Essentials', 'description' => 'Quality home and kitchen products'],
            ['name' => 'Sports Elite', 'description' => 'Premium sports equipment'],
            ['name' => 'Beauty Box', 'description' => 'Luxury beauty and skincare'],
            ['name' => 'Kids Corner', 'description' => 'Everything for children'],
            ['name' => 'Pet Paradise', 'description' => 'Pet supplies and accessories'],
            ['name' => 'Garden Glory', 'description' => 'Garden tools and outdoor equipment'],
            ['name' => 'Book Nook', 'description' => 'Books and stationery'],
            ['name' => 'Craft Central', 'description' => 'Art supplies and crafting materials'],
        ];

        // Get all vendor user IDs in one query
        $vendorUserIds = User::query()
            ->where('role_id', function ($query) {
                $query->select('id')
                    ->from('roles')
                    ->where('name', 'Vendor')
                    ->limit(1);
            })
            ->pluck('id')
            ->all();

        $vendorsToInsert = array_map(function ($vendor) use ($vendorUserIds) {
            return [
                'user_id'     => $vendorUserIds[array_rand($vendorUserIds)],
                'name'        => $vendor['name'],
                'description' => $vendor['description'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }, $vendors);

        foreach ($vendorsToInsert as $vendorData) {
            $vendor = Vendor::create($vendorData);
            $this->attachMedia($vendor);
        }
    }

    private function attachMedia(Vendor $vendor): void
    {
        $images = collect(Storage::disk('local')->files('demo-images'));

        $vendor->addMediaFromDisk($images->random())
            ->preservingOriginal()
            ->toMediaCollection('logo');
    }
}
