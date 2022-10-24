@extends('admin.layouts.app')
@section('title')
    Edit user
@endsection
@section('content')
    <x-headers title="Edit user" icon="fas fa-pencil-alt" parent="Users" parent-icon="fas fa-users"
               parent-route="admin.users.index"/>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
