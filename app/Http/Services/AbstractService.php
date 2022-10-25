<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class AbstractService
{
    protected $model;

    public function index()
    {
        return $this->model::orderByDesc('created_at')->paginate(10);
    }

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store(Request $request)
    {

    }
}
