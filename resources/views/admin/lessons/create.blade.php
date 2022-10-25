@extends('admin.layouts.app')
@section('title')
    Lessons
@endsection
@section('content')
    <x-headers title="Create lesson" icon="fas fa-plus" parent="Lessons" parent-route="admin.lessons.index"
               parent-icon="fas fa-book-reader"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.lessons.store')}}" method="POST">
                @csrf
                @include('admin.lessons.form')
            </form>
        </div>
    </div>
@endsection
