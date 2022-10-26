<?php

namespace App\Http\Controllers;

use App\Http\Services\SubjectService;

class SubjectController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new SubjectService();
//        $this->middleware('permission:subjects-index')->only('index');
//        $this->middleware('permission:subjects-create')->only(['create', 'store']);
//        $this->middleware('permission:subjects-update')->only(['edit', 'update']);
//        $this->middleware('permission:subjects-destroy')->only('destroy');
    }

    public function index()
    {
        $subjects = $this->service->index();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function show($id)
    {
        $subject = $this->service->getItem($id);
        return view('admin.subjects.show', compact('subject'));
    }

    public function create()
    {
        $subject = $this->service->create();
        return view('admin.subjects.create', compact('subject'));
    }

    public function store()
    {
        $this->service->store(request()->all());
        return redirect()->route('admin.subjects.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        $subject = $this->service->edit($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update($id)
    {
        $this->service->update(request()->all(), $id);
        return redirect()->route('admin.subjects.index')->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.subjects.index')->with('success', 'Deleted!');
    }
}
