<?php

namespace App\Http\Services;

use App\Models\User;
use Hash;

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
        return new User();
    }

    public function store(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
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
