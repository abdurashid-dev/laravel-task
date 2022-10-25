@extends('admin.layouts.app')
@section('title')
    Teachers
@endsection
@section('content')
    <x-headers title="Create teacher" icon="fas fa-plus" parent="Teacher" parent-route="admin.teachers.index"
               parent-icon="fas fa-users"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.teachers.store')}}" method="POST">
                @csrf
                @include('admin.teachers.form')
            </form>
        </div>
    </div>
@endsection
