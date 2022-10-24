@extends('admin.layouts.app')
@section('title')
    Edit user
@endsection
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <x-headers title="Edit user" icon="fas fa-pencil-alt" parent="Users" parent-icon="fas fa-users"
               parent-route="admin.users.index"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.users.update', $user)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.users.forms')
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
