@extends('admin.layouts.app')
@section('title')
    Teachers
@endsection
@section('content')
    <form action="{{route('admin.teachers.store')}}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="submit">
    </form>
@endsection
