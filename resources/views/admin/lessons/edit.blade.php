@extends('admin.layouts.app')
@section('title')
    Lessons
@endsection
@section('content')
    <x-headers title="Edit lesson" icon="fas fa-plus" parent="Lessons" parent-route="admin.lessons.index"
               parent-icon="fas fa-book-reader"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.lessons.update', $lesson)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.lessons.form')
            </form>
        </div>
    </div>
@endsection
