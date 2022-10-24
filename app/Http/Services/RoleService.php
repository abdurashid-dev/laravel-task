<?php

namespace App\Http\Services;

use Spatie\Permission\Models\Role;

class RoleService
{
    public function index()
    {
        return Role::orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data): void
    {
        Role::create($data);
    }

    public function destroy($id): void
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}
