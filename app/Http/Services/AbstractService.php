<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;

class AbstractService
{
    protected $model;

    public function index()
    {
        return $this->model::orderByDesc('created_at')->paginate(10);
    }

    public function getItem($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store(array $data)
    {
        //get fields
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        $validator = Validator::make($data, $rules);
        $data = $validator->validated();
        $object = new $this->model;
        foreach ($fields as $field) {
            $field->fill($object, $data);
        }
        $object->save();
    }

    public function update(array $data, $id)
    {
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        $validator = Validator::make($data, $rules);
        $data = $validator->validated();
        $item = $this->getItem($id);
        foreach ($fields as $field) {
            $field->fill($item, $data);
        }
        $item->save();
    }

    public function destroy($id)
    {
        $item = $this->getItem($id);
        $item->delete();
    }

    public function getFields()
    {
        return [];
    }
}
