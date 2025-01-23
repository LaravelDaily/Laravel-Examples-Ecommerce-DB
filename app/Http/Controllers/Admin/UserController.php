<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Models\User;

class UserController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show(User $user) {}

    public function edit(User $user) {}

    public function update(Request $request, User $user) {}

    public function destroy(User $user) {}
}
