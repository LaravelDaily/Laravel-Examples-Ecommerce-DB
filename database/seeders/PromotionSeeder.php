<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payments\Models\Promotion;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        $promotions = [];

        for ($i = 0; $i < 15; $i++) {
            $start_at = now()->addDays(rand(-30, 30));

            $promotions[] = [
                'title'       => "Promotion " . ($i + 1),
                'description' => "Description for promotion " . ($i + 1),
                'start_at'    => $start_at,
                'end_at'      => $start_at->copy()->addDays(rand(7, 30)),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        Promotion::insert($promotions);
    }
}
