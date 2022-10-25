@extends('admin.layouts.app')
@section('title')
    Lesson
@endsection
@section('content')
    <x-headers title="Lesson({{$lesson->name}})" icon="fas fa-eye" parent="Lessons"
               parent-route="admin.lessons.index" parent-icon="fas fa-book-reader"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{$lesson->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$lesson->name}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
