<?php

namespace App\Http\Services;

use App\Models\User;

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
        User::create($data);
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
}
