<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service =
        $this->middleware('permission:roles-list')->only('index');
    }

    public function index()
    {

    }
}
