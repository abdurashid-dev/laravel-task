<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Services\RoleService;

class RoleController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new RoleService();
        $this->middleware('permission:roles-list')->only('index');
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
}
