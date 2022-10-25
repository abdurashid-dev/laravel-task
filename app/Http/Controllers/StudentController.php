<?php

namespace App\Http\Controllers;

use App\Http\Services\StudentService;

class StudentController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new StudentService();
    }

    public function index()
    {
        $students = $this->service->index();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $student = $this->service->create();
        return view('admin.students.create', compact('student'));
    }

    public function store()
    {
        $this->service->store(request()->all());
        return redirect()->route('admin.students.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        $student = $this->service->edit($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update($id)
    {
        $this->service->update(request()->all(), $id);
        return redirect()->route('admin.students.index')->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.students.index')->with('success', 'Deleted!');
    }
}
