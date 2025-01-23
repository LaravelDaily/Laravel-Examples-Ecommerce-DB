<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Marketing\Models\EmailCampaign;

class EmailCampaignController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(EmailCampaign $emailCampaign) {}

    public function edit(EmailCampaign $emailCampaign) {}

    public function update(Request $request, EmailCampaign $emailCampaign) {}

    public function destroy(EmailCampaign $emailCampaign) {}
}
