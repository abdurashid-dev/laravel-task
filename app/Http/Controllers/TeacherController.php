<?php

namespace App\Http\Controllers;

use App\Http\Services\TeacherService;

class TeacherController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new TeacherService();
    }

    public function index()
    {
        $teachers = $this->service->index();
        dd($teachers);
    }
}
