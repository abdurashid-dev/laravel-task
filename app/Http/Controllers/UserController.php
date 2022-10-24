<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function index()
    {
        $users = $this->service->index();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->service->show($id);
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        [$user, $roles] = $this->service->create();
        return view('admin.users.create', compact('user', 'roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.users.index')->with('success', 'New User added!');
    }

    public function edit($id)
    {
        $user = $this->service->show($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }

    public function changePassword($id)
    {
        $user = $this->service->show($id);
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(UserUpdatePasswordRequest $request, $id)
    {
        $this->service->updatePassword($request->validated(), $id);
        return redirect()->route('admin.users.index')->with('success', 'Password changed');
    }
}
