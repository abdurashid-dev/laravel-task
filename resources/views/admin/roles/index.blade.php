@extends('admin.layouts.app')
@section('title')
    Roles
@endsection
@section('content')
    <x-header title="Roles" icon="fas fa-user-lock"/>
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
        <div class="card-header">
            <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createRoleModal"><i
                    class="fas fa-plus"></i>
                Add new
            </button>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                @forelse($roles as $role)
                    <tr>
                        <td>{{(($roles->currentpage()-1)*$roles->perpage()+($loop->index+1))}}</td>
                        <td class="w-25">{{$role->name}}</td>
                        <td class="w-50">
                            <a href="{{route('admin.roles.give-permissions', $role)}}" class="btn btn-primary">Permissions</a>
                            <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.roles.destroy', $role)}}" class="d-inline-block"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No roles found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="mt-3 float-right">
                {{$roles->links()}}
            </div>
        </div>
    </div>
    @include('admin.roles.create')
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
