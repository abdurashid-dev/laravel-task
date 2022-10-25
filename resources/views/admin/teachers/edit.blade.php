@extends('admin.layouts.app')
@section('title')
    Teachers
@endsection
@section('content')
    <x-headers title="Edit teacher" icon="fas fa-plus" parent="Teacher" parent-route="admin.teachers.index"
               parent-icon="fas fa-users"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.teachers.update', $teacher)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.teachers.form')
            </form>
        </div>
    </div>
@endsection
