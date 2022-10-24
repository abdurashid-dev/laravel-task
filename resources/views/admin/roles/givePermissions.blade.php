@extends('admin.layouts.app')
@section('title')
    Give permissions
@endsection
@section('content')
    <x-header title="Give permissions" icon="fas fa-key"/>
    <div class="card">
        <div class="card-header">
            Edit permissions
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nameInput" class="form-label">Role name</label>
                <input type="text" disabled class="form-control" id="nameInput" value="{{$role->name}}">
            </div>
            <div class="mb-3">
                @foreach($permissions as $permission)
                    <label for="btncheck{{$permission->id}}">{{$permission->name}}</label>
                    <input type="checkbox"
                           class="btn-check"
                           id="btncheck{{$permission->id}}"
                           autocomplete="off"
                           @if(!empty($permission->roles->firstWhere('id', $role->id)))
                               checked
                        @endif
                    />
                    <br>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
        </div>
    </div>
@endsection
