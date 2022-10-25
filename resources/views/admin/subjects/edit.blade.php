@extends('admin.layouts.app')
@section('title')
    Subjects
@endsection
@section('content')
    <x-headers title="Edit subject" icon="fas fa-plus" parent="Subjects" parent-route="admin.subjects.index"
               parent-icon="fas fa-users"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.subjects.update', $subject)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.subjects.form')
            </form>
        </div>
    </div>
@endsection
