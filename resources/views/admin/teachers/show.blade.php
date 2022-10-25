@extends('admin.layouts.app')
@section('title')
    Teacher
@endsection
@section('content')
    <x-headers title="Teacher({{$teacher->name}})" icon="fas fa-eye" parent="Teachers"
               parent-route="admin.teachers.index" parent-icon="fas fa-users"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{$teacher->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$teacher->name}}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{$teacher->subject_id}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
