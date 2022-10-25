<?php

namespace App\Http\Services;

use App\Fields\TextField;
use App\Models\Subject;
use App\Models\Teacher;

class TeacherService extends AbstractService
{
    protected $model = Teacher::class;

    public function getFields()
    {
        return [
            TextField::make('name'),
            TextField::make('subject_id')
        ];
    }

    public function create()
    {
        $teacher = new $this->model;
        $subjects = Subject::all();
        return [$teacher, $subjects];
    }

    public function edit($id)
    {
        $teacher = $this->show($id);
        $subjects = Subject::all();
        return [$teacher, $subjects];
    }
}
