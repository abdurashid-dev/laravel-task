<?php

namespace App\Http\Services;

use Spatie\Permission\Models\Permission;
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

    public function edit($id)
    {
        return Role::findOrFail($id);
    }

    public function update(array $data, $id): void
    {
        $role = $this->edit($id);
        $role->update($data);
    }

    public function destroy($id): void
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }

    public function givePermissions($id)
    {
        $role = $this->edit($id);
        $permissions = Permission::with(['roles' => fn($q) => $q->select('roles.id')])->get();
        return [$role, $permissions];
    }
}
