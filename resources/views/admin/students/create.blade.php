@extends('admin.layouts.app')
@section('title')
    Students
@endsection
@section('content')
    <x-headers title="Create student" icon="fas fa-plus" parent="Students" parent-route="admin.students.index"
               parent-icon="fas fa-user-graduate"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.students.store')}}" method="POST">
                @csrf
                @include('admin.students.form')
            </form>
        </div>
    </div>
@endsection
