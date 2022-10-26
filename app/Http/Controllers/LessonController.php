<?php

namespace App\Http\Controllers;

use App\Http\Services\LessonService;

class LessonController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new LessonService();
//        $this->middleware('permission:lessons-index')->only('index');
//        $this->middleware('permission:lessons-create')->only(['create', 'store']);
//        $this->middleware('permission:lessons-update')->only(['edit', 'update']);
//        $this->middleware('permission:lessons-destroy')->only('destroy');
    }

    public function index()
    {
        $lessons = $this->service->index();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $lesson = $this->service->create();
        return view('admin.lessons.create', compact('lesson'));
    }

    public function store()
    {
        $this->service->store(request()->all());
        return redirect()->route('admin.lessons.index')->with('success', 'Created!');
    }

    public function edit($id)
    {
        $lesson = $this->service->edit($id);
        return view('admin.lessons.edit', compact('lesson'));
    }

    public function update($id)
    {
        $this->service->update(request()->all(), $id);
        return redirect()->route('admin.lessons.index')->with('success', 'Updated!');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('admin.lessons.index')->with('success', 'Deleted!');
    }
}
