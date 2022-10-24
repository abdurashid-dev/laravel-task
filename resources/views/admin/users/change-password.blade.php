@extends('admin.layouts.app')
@section('title')
    Edit user password
@endsection
@section('content')
    <x-headers title="Edit user password ({{$user->name}})" icon="fas fa-pencil-alt" parent="Users" parent-icon="fas fa-users"
               parent-route="admin.users.index"/>
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="{{route('admin.users.update-password', $user)}}" method="POST">
                @csrf
                @include('admin.users.password-forms')
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
