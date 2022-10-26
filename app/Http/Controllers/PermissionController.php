<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Services\PermissionService;

class PermissionController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new PermissionService();
//        $this->middleware('permission:permissions-index')->only('index');
//        $this->middleware('permission:permissions-create')->only('store');
//        $this->middleware('permission:permissions-update')->only(['edit', 'update']);
//        $this->middleware('permission:permissions-destroy')->only('destroy');
    }

    public function index()
    {
        $permissions = $this->service->index();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(PermissionRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.permissions.index')->with('success', 'Permission created!');
    }

    public function edit($id)
    {
        $permission = $this->service->edit($id);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission Edited!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted!');
    }
}
