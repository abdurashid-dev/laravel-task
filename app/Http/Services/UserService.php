<?php

namespace App\Http\Services;

use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function index()
    {
        return User::whereNot('id', auth()->user()->id)->orderByDesc('created_at')->paginate();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function create()
    {
        $roles = Role::with('users')->get();
        $user = new User();
        return [$user, $roles];
    }

    public function store(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $user->assignRole($data['roles']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return [$user, $roles];
    }

    public function update(array $data, $id)
    {
        $user = $this->show($id);
        $user->update($data);
    }

    public function destroy($id)
    {
        $user = $this->show($id);
        $user->delete();
    }

    public function updatePassword(array $data, $id)
    {
        $user = $this->show($id);
        $user->update([
            'password' => Hash::make($data['password'])
        ]);
    }
}
