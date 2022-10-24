@extends('admin.layouts.app')
@section('title')
    Users
@endsection
@section('content')
    <x-header title="Users" icon="fas fa-users"/>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.users.create')}}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i>
                Add new
            </a>
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
                            <a href="{{route('admin.users.change-password', $user)}}" class="btn btn-warning">Change
                                password</a>
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
