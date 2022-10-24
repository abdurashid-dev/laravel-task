@extends('admin.layouts.app')
@section('title')
    Users
@endsection
@section('content')
    <x-header title="Users" icon="fas fa-users"/>
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
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @forelse($users as $user)
                    <tr>
                        <td>{{(($users->currentpage()-1)*$users->perpage()+($loop->index+1))}}</td>
                        <td class="w-25">{{$user->name}}</td>
                        <td class="w-25">{{$user->email}}</td>
                        <td class="w-50">
                            <a href="#" class="btn btn-primary">Assign role</a>
                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-success">Edit</a>
                            <form action="{{route('admin.users.destroy', $user)}}" class="d-inline-block"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Users found :(</td>
                    </tr>
                @endforelse
            </table>
            <div class="mt-3 float-right">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('partials.sweet-alert')
@endsection
