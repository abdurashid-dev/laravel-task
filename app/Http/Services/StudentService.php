<?php

namespace App\Http\Services;

use App\Fields\TextField;
use App\Models\Student;

class StudentService extends AbstractService
{
    protected $model = Student::class;

    public function getFields()
    {
        return [
            TextField::make('name')
        ];
    }

    public function create()
    {
        return new $this->model;
    }

    public function edit($id)
    {
        return $this->getItem($id);
    }
}
