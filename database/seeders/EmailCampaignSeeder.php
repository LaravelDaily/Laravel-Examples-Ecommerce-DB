<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Marketing\Models\EmailCampaign;
use Modules\Marketing\Models\EmailCampaignStatus;

class EmailCampaignSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = EmailCampaignStatus::all();
        $campaigns = [];

        for ($i = 0; $i < 20; $i++) {
            $sent_at = now()->subDays(rand(1, 30));
            $campaigns[] = [
                'title'      => "Campaign " . ($i + 1),
                'content'    => "Email campaign content for campaign " . ($i + 1),
                'status'     => $statuses->random()->id,
                'sent_at'    => $sent_at,
                'created_at' => $sent_at->subDays(rand(1, 5)),
                'updated_at' => $sent_at,
            ];
        }

        EmailCampaign::insert($campaigns);
    }
}
