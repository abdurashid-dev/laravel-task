<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
        $user = $this->service->create();
        return view('admin.users.create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.users.index')->with('success', 'New User added!');
    }

    public function edit($id)
    {
        $user = $this->service->show($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('admin.users.index')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }
}
