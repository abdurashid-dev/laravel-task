@extends('admin.layouts.app')
@section('title')
    Subjects
@endsection
@section('content')
    <x-headers title="Create subject" icon="fas fa-plus" parent="Subjects" parent-route="admin.subjects.index"
               parent-icon="fas fa-book-reader"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.subjects.store')}}" method="POST">
                @csrf
                @include('admin.subjects.form')
            </form>
        </div>
    </div>
@endsection
