<?php

namespace App\Http\Controllers;

use App\Http\Requests\GivePermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Services\RoleService;

class RoleController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new RoleService();
//        $this->middleware('permission:roles-list')->only('index');
//        $this->middleware('permission:roles-create')->only('store');
//        $this->middleware('permission:roles-update')->only(['edit', 'update']);
//        $this->middleware('permission:roles-destroy')->only('destroy');
//        $this->middleware('permission:roles-givePermissions')->only('givePermissions');
//        $this->middleware('permission:roles-syncPermissions')->only('syncPermissions');
    }

    public function index()
    {
        $roles = $this->service->index();
        return view('admin.roles.index', compact('roles'));
    }

    public function store(RoleRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.roles.index')->with('success', 'New role added!');
    }

    public function edit($id)
    {
        $role = $this->service->edit($id);
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('admin.roles.index')->with('success', 'Role updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted!');
    }

    public function givePermissions($id)
    {
        [$role, $permissions] = $this->service->givePermissions($id);
        return view('admin.roles.givePermissions', compact('role', 'permissions'));
    }

    public function syncPermissions(GivePermissionRequest $request, $role)
    {
        $this->service->syncPermissions($request->validated(), $role);
        return redirect()->route('admin.roles.index')->with('success', 'Permissions attached!');
    }
}
