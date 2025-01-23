<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Payments\Models\Promotion;

class PromotionController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(Promotion $promotion) {}

    public function edit(Promotion $promotion) {}

    public function update(Request $request, Promotion $promotion) {}

    public function destroy(Promotion $promotion) {}
}
