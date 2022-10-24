@extends('admin.layouts.app')
@section('title')
    Roles
@endsection
@section('content')
    <x-headers title="Roles" icon="fas fa-pencil-alt" parent-route="admin.roles.index" parent-icon="fas fa-user-lock"
               parent="Roles"/>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('admin.roles.update', $role)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Role name</label>
                    <input type="text" class="form-control" id="nameInput" name="name" required value="{{$role->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
