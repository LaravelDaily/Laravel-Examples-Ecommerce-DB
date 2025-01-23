<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Reviews\Models\Review;

class ReviewController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(Review $review) {}

    public function edit(Review $review) {}

    public function update(Request $request, Review $review) {}

    public function destroy(Review $review) {}
}
