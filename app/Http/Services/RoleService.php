<?php

namespace App\Http\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function index()
    {
        return Role::paginate(10);
    }
}
