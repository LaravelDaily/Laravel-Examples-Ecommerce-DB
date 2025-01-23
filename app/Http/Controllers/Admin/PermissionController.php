<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Models\Permission;

class PermissionController extends Controller
{
    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function edit(Permission $permission) {}

    public function update(Request $request, Permission $permission) {}

    public function destroy(Permission $permission) {}
}
