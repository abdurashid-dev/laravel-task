@extends('admin.layouts.app')
@section('title')
    Subject
@endsection
@section('content')
    <x-headers title="Subject({{$subject->name}})" icon="fas fa-eye" parent="Subjects"
               parent-route="admin.subjects.index" parent-icon="fas fa-book-reader"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{$subject->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$subject->name}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
