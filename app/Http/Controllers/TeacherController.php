<?php

namespace App\Http\Controllers;

use App\Http\Services\TeacherService;

class TeacherController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new TeacherService();
//        $this->middleware('permission:teachers-index')->only('index');
//        $this->middleware('permission:teachers-create')->only(['create', 'store']);
//        $this->middleware('permission:teachers-update')->only(['edit', 'update']);
//        $this->middleware('permission:teachers-destroy')->only('destroy');
    }

    public function index()
    {
        $teachers = $this->service->index();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function show($id)
    {
        $teacher = $this->service->show($id);
        return view('admin.teachers.show', compact('teacher'));
    }

    public function create()
    {
        [$teacher, $subjects] = $this->service->create();
        return view('admin.teachers.create', compact('teacher', 'subjects'));
    }

    public function store()
    {
        $this->service->store(request()->all());
        return redirect()->route('admin.teachers.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        [$teacher, $subjects] = $this->service->edit($id);
        return view('admin.teachers.edit', compact('teacher', 'subjects'));
    }

    public function update($id)
    {
        $this->service->update(request()->all(), $id);
        return redirect()->route('admin.teachers.index')->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.teachers.index')->with('success', 'Deleted!');
    }
}
