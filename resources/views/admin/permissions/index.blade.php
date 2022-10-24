@extends('admin.layouts.app')
@section('title')
    Permissions
@endsection
@section('content')
    <x-header title="Permissions" icon="fas fa-key"/>
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
            <button class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#createPermissionModal">
                <i class="fas fa-plus"></i>
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
                @forelse($permissions as $permission)
                    <tr>
                        <td>{{(($permissions->currentpage()-1)*$permissions->perpage()+($loop->index+1))}}</td>
                        <td class="w-25">{{$permission->name}}</td>
                        <td class="w-50">
                            <a href="{{route('admin.permissions.edit', $permission)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.permissions.destroy', $permission)}}" class="d-inline-block"
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
                {{$permissions->links()}}
            </div>
        </div>
    </div>
    @include('admin.permissions.create')
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
