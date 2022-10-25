@extends('admin.layouts.app')
@section('title')
    Students
@endsection
@section('content')
    <x-headers title="Edit lesson" icon="fas fa-plus" parent="Students" parent-route="admin.students.index"
               parent-icon="fas fa-book"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.students.update', $student)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.students.form')
            </form>
        </div>
    </div>
@endsection
