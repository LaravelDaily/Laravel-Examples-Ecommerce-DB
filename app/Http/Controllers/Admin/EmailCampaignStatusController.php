<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Marketing\Models\EmailCampaignStatus;

class EmailCampaignStatusController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(EmailCampaignStatus $emailCampaignStatus) {}

    public function update(Request $request, EmailCampaignStatus $emailCampaignStatus) {}

    public function destroy(EmailCampaignStatus $emailCampaignStatus) {}
}
