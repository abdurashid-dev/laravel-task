@extends('admin.layouts.app')
@section('title')
    Permissions
@endsection
@section('content')
    <x-headers title="Edit permissions" icon="fas fa-pencil-alt" parent-route="admin.permissions.index"
               parent-icon="fas fa-user-lock"
               parent="Permissions"/>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('admin.permissions.update', $permission)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Permission title</label>
                    <input type="text" class="form-control" id="nameInput" name="name" required
                           value="{{$permission->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
@endsection
