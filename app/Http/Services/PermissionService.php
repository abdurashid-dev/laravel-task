<?php

namespace App\Http\Services;

use Spatie\Permission\Models\Permission;

class PermissionService
{
    public function index()
    {
        return Permission::orderByDesc('created_at')->paginate(10);
    }

    public function store(array $data)
    {
        Permission::create($data);
    }

    public function edit($id)
    {
        return Permission::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $role = $this->edit($id);
        $role->update($data);
    }
}
