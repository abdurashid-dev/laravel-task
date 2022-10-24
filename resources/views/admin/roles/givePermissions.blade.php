@extends('admin.layouts.app')
@section('title')
    Give permissions
@endsection
@section('content')
    <x-headers title="Give permissions" parent="Roles" parent-route="admin.roles.index" parent-icon="fas fa-user-lock"
               icon="fas fa-key"/>
    <div class="card">
        <div class="card-header">
            Edit permissions
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nameInput" class="form-label">Role name</label>
                <input type="text" disabled class="form-control" id="nameInput" value="{{$role->name}}">
            </div>
            <form action="{{route('admin.roles.sync-permissions', $role)}}" method="POST">
                @csrf
                <div class="mb-3">
                    @foreach($permissions as $permission)
                        <label for="btncheck{{$permission->id}}">{{$permission->name}}</label>
                        <input type="checkbox"
                               class="btn-check"
                               name="permissions[]"
                               value="{{$permission->id}}"
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
            </form>
        </div>
    </div>
@endsection
